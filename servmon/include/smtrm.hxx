#ifndef SM_SMTRM_HXX_INCLUDED_
#define SM_SMTRM_HXX_INCLUDED_

#include "smstdinc.hxx"
#include "smcfg.hxx"
#include "smirc.hxx"
#include "smutl.hxx"
#include "smauth.hxx"

namespace smtrm {

template<class tt>
class handler_node;

template<class tt>
class comdat {
public:
	comdat(tt& term_)
	: term(term_)
	{}
 
	int num_params() const { 
		return ps.size();
	}
 
	std::string const & p (unsigned int n) const {
		return ps[n];
	}
	void add_p (std::string const & p) { 
		ps.push_back(p); 
	}
	void warn (std::string const & msg) const {
		term.warn(msg);
	}
	void inform (std::string const & msg) const {
		term.inform(msg); 
	}
	void error (std::string const & msg) const {
		term.error(msg);
	}
	void wrtln (std::string const & msg = "") const {
		term.wrtln(msg);
	}
	void wrt (std::string const & msg) const {
		term.wrt(msg);
	}
	void chgrt (handler_node<tt>* newrt, std::string const& prm) const {
		term.chgrt(newrt, prm);
	}
	std::string read_string (std::string const& prompt) const {
		term.wrt(prompt);
		std::string s;
		term.read_echo(s);
		return s;
	}
	std::string getpass (std::string const& prompt) const
	{
		term.wrt(prompt);
		term.echo(false);
		std::string s;// = term.read();
		term.echo(true);
		wrtln();
		return s;
	}
	void rst(void) {
		ps.resize(0);
	}
	tt& term; //XXX
private:
	std::vector<std::string> ps;
};

template<class tt>
class handler {
public:
	virtual ~handler() {}
	virtual bool execute (comdat<tt> const&) = 0;
};

template<class tt>
struct handler_node {
	handler_node()
	: terminal(NULL)
	{}

	typedef handler<tt> handler_t;

	std::map<std::string, handler_node> childs;
	handler_t *terminal;
	std::string help;
	std::string name; /* this shouldn't really be here.. */

	bool 	add_child(std::string cmd, handler_t *h, std::string const & desc) {
		if (cmd.empty()) {
			terminal = h;
			help = desc;
			return true;
		}
		std::string node = smutl::car(cmd);
		childs[node].add_child(cmd, h, desc);
		childs[node].name = node;
		return true;
	}

	std::vector<handler_node *>
	find_matches(std::string const& word, bool& waswild) {
		std::vector<handler_node *> result;
		waswild = false;
		for (typename std::map<std::string, handler_node>::iterator it = childs.begin(),
			end = childs.end(); it != end; ++it) {
			if (it->first.substr(0, word.size()) == word) {
				// if its an exact match, just return it
				if (it->first == word) {
					result.erase(result.begin(), result.end());
					result.push_back(&it->second);
					return result;
				}
				result.push_back(&it->second);
			}
		}
		if (result.empty()) {
			if (childs.find("%s") != childs.end()) {
				waswild = true;
				result.push_back(&childs.find("%s")->second);
			}
		}
		return result;
	}

	template<class T>
	bool install (std::string const &command, T cb, std::string const &desc)
	{
		T *h;
		try {
			h = new T (cb);
		} catch (std::bad_alloc&) {
			return false;
		}
		return _install(command, h, desc);
	}
	bool install (std::string const &command, std::string const & desc) {
		return add_child(command, NULL, desc); 
	}
	bool _install (std::string const &command, handler_t *h, std::string const &desc) {
		return add_child(command, h, desc); 
	}
};


template<class tt>
struct tmcmds : public smutl::singleton<tmcmds<tt> > {
#include "../smstdrt.cxx"
	tmcmds() {
		stdrt.install("show version", cmd_show_version(), "Show software version");
		stdrt.install("exit", cmd_exit(), "End session");
		stdrt.install("show irc server %s", cfg_irc_showserver(), 
				"Describe a configured server");
		eblrt = stdrt;
		stdrt.install("enable", cmd_enable(), "Enter privileged mode");
		eblrt.install("disable", chg_parser(stdrt, "%s> "), 
				"Return to non-privileged mode");
		eblrt.install("configure", chg_parser(cfgrt, "%s(conf)# "), "Configure servmon");
		cfgrt.install("exit", chg_parser(eblrt, "%s# "), "Exit configure mode");
		cfgrt.install("enable password", cfg_eblpass(), "Change enable password");
		cfgrt.install("function irc", chg_parser(ircrt, "%s(conf-irc)# "), 
				"Configure Internet Relay Chat connections");
		cfgrt.install("user %s password", cfg_userpass(), "Create a new account");
		cfgrt.install("no user %s", cfg_no_user(), "Remove a user account");
		ircrt.install("exit", chg_parser(cfgrt, "%s(conf)# "),
				"Exit IRC configuration mode");
		ircrt.install("server %s primary-nickname %s", cfg_irc_servnick(),
				"Set primary nickname for IRC server");
		ircrt.install("server %s secondary-nickname %s", cfg_irc_servsecnick(),
				"Set secondary nickname for IRC server");
		ircrt.install("no server %s", cfg_irc_noserver(),
				"Remove a configured server");
		ircrt.install("show server %s", cfg_irc_showserver(),
				"Describe a configured server");
	}
	handler_node<tt> stdrt;
	handler_node<tt> eblrt;
	handler_node<tt> cfgrt;
	handler_node<tt> ircrt;
};

template<class intft>
class trmsrv : noncopyable {
public:
	typedef boost::function<void(trmsrv&, std::string const&)> rl_cb_t;

	trmsrv(intft sckt_)
	: intf(sckt_)
	, cmds_root(instance<tmcmds<trmsrv> >()->stdrt)
	, prm("servmon> ")
	, cd(*this)
	, doecho(true)
	, rlip(false)
	, destroyme(false)
	{
		stb_nrml();
	}

	virtual ~trmsrv(void) {
		std::cerr << "trmsrv dtor\n";
	}
	void stb_nrml(void) {
		for (int i = 0; i < 32; ++i)
			binds[i] = boost::bind(&trmsrv::prc_ign, this, _1);
		for (int i = 32; i <= 255; ++i)
			binds[i] = boost::bind(&trmsrv::prc_char, this, _1);
		binds['\r'] = boost::bind(&trmsrv::prc_nl, this, _1);
		binds[' '] = boost::bind(&trmsrv::prc_spc, this, _1);
		binds['?'] = boost::bind(&trmsrv::prc_help, this, _1);
		binds[0x0C] = boost::bind(&trmsrv::prc_redraw, this, _1); // ^L
		binds[0177] = binds['\b'] = boost::bind(&trmsrv::prc_del, this, _1);
		binds[0x15] = boost::bind(&trmsrv::prc_erase, this, _1); // ^U
	}
	void stb_readline(void) {
		binds[' '] = binds['?'] =
			boost::bind(&trmsrv::prc_char, this, _1);
	}

	void start(void) {
		init();
		intf->cb(boost::bind(&trmsrv::gd_cb, this, _1, _2));
		std::string user, pass;
		wrtln();
		wrt("Username: ");
		readline(boost::bind(&trmsrv::gt_usr_cb, this, _2));
	}
	void gt_usr_cb(std::string const& user) {
		usrnam = user;
		echo(false);
		wrt("Password: ");
		readline(boost::bind(&trmsrv::gt_psw_cb, this, _2));
	}
	void gt_psw_cb(std::string const& pass) {
		echo(true);
		wrtln();
		if (!smauth::login_usr(usrnam, pass)) {
			wrtln("% [E] Username or password incorrect.");
			disconnect();
			return;
		}
	}
	void gd_cb(smnet::inetclntp s, u_char c) {
		std::cerr << "read data: [" << c << "]\n";
		if (!binds[c](c))
			disconnect();
		if (destroyme) delete this;
	}
	void echo(bool doecho_) {
		intf->echo(doecho = doecho_);
	}

	void wrtln(std::string const& s = "") {
		wrt(s); wrt("\r\n");
	}
	void wrt(u_char c) {
		if (destroyme) return;
		intf->wrt(&c, 1);
	}
	void wrt(std::string const& s) {
		if (destroyme) return;
		intf->wrt(s);
	}
	void chgrt(handler_node<trmsrv>* newrt, std::string const& prompt) {
		cmds_root = *newrt;
		prm = str(format(prompt) % "servmon");
	}
	void readline(rl_cb_t cb) {
		rl_cb = cb;
		rlip = true;
		stb_readline();
	}
	bool prc_ign(char) {
		return true;
	}
	bool prc_nl(char) {
		std::cerr << "read: [" << ln << "]\n";
		if (rlip) {
			stb_nrml();
			rlip = false;
			wrtln();
			rl_cb(*this, ln);
			ln = "";
			if (!rlip) wrt(prm);
			return true;
		}
		bool b = true;
		if (ln[ln.size() - 1] == ' ') {
			while (ln[ln.size() - 1] == ' ') 
				ln.erase(ln.end() - 1);
			if (ln.find(' ') != ln.npos)
				thisword = ln.substr(ln.rfind(' ') + 1, ln.size());
			else
				thisword = ln;
			hstack.erase(hstack.begin());
		}
		ln = "";
		bool waswild;
		std::vector<handler_node_t *> matches = hstack[0]->find_matches(thisword, waswild);
		if (matches.empty()) {
			wrtln();
			wrtln("% [E] No matches.");
			goto end;
		} else if (matches.size() > 1) {
			wrtln();
			wrtln("% [E] Ambiguous command.");
			goto end;
		}
		if (!matches[0]->terminal) {
			wrtln();
			wrtln("% [E] Incomplete command.");
			goto end;
		}
		if (waswild)
			cd.add_p(thisword);
		else
			wrt(matches[0]->name.substr(thisword.size()));
		wrtln();
		b = matches[0]->terminal->execute(cd);
	
end:
		if (b) {
			init();
			if (!rlip) wrt(prm + ln);
		}
		return b;
	}
	bool prc_char(char c) {
		if (rlip) {
			ln += c;
			if (doecho) wrt(c);
			return true;
		}
		bool waswild;
		std::vector<handler_node_t *> matches =
		       hstack[0]->find_matches(thisword + c, waswild);
		if (matches.empty()) {
			wrtln();
			wrtln("% [E] No matching command.");
			wrt(prm + ln);
			return true;
		}
		ln += c;
		thisword += c;
		if (doecho) wrt(c);
		return true;
	}
	bool prc_spc(char c) {
		if (ln.empty() || (ln[ln.size() - 1] == ' '))
			return true;
		bool waswild;
		std::vector<handler_node_t *> matches = hstack[0]->find_matches(thisword, waswild);
		if (matches.size() > 1) {
			wrtln();
			wrtln("%% [E] Ambiguous command");
			wrt(prm + ln);
			return true;
		}
		hstack.insert(hstack.begin(), matches[0]);
		std::string comp;
		if (!waswild) {
			comp = matches[0]->name.substr(thisword.size());
			wrt(comp);
		} else
			cd.add_p(thisword);
		if (doecho) wrt(' ');
		thisword = "";
		ln += comp + c;
		return true;
	}
	bool prc_help(char) {
		bool waswild;
		if (doecho) wrtln("?");
		std::vector<handler_node_t *> matches = hstack[0]->find_matches(thisword, waswild);
		for (typename std::vector<handler_node_t *>::iterator it = matches.begin(),
			 end = matches.end(); it != end; ++it) {
			wrtln(str(format("  %s %s") % 
				boost::io::group(std::left, std::setw(20), (**it).name)
				% (**it).help));
		}
		wrt(prm + ln);
		return true;
	}
	bool prc_redraw(char) {
		wrtln();
		wrt(prm + ln);
		return true;
	}
	bool prc_del(char) {
		if (ln.empty())
			return true;
		wrt("\b \b");
		if (ln.size() == 1) {
			ln = thisword = "";
			return true;
		}
		if (ln.size() > 1 && ln[ln.size() - 1] == ' ') {
			hstack.erase(hstack.begin());
			ln.resize(ln.size() - 1);
			if (ln.find(' ') != ln.npos)
				thisword = ln.substr(ln.rfind(' ') + 1, ln.size());
			else
				thisword = ln;
			return true;
		}
		if (ln.size() > 1 && ln[ln.size() - 1] != ' ') {
			ln.resize(ln.size() - 1);
			thisword.resize(thisword.size() - 1);
			return true;
		}
		return true;
	}
	bool prc_erase(char) {
		for (int i = ln.size(); i; --i)
			wrt("\b \b");
		wrtln();
		wrt(prm + ln);
		init();
		return true;
	}

	void init(void) {
		hstack.resize(1);
		hstack[0] = &cmds_root;
		cd.rst();
		ln = thisword = "";
	}

	void disconnect(void) {
		destroyme = true;
	}
	void warn (std::string const & msg) {
		wrtln(str(format("%% [W] %s") % msg));
	}
	void inform (std::string const & msg) {
		wrtln(str(format("%% [I] %s") % msg)); 
	}
	void error (std::string const & msg) {
		wrtln(str(format("%% [E] %s") % msg));
	}
private:
	intft intf;
	std::map<u_char, boost::function<bool (char)> > binds;
	std::string usrnam;
	// bookkeeping for parser
	rl_cb_t rl_cb;
	std::string ln;
	std::string thisword;
	typedef handler_node<trmsrv> handler_node_t;
	std::vector<handler_node_t *> hstack;
	handler_node_t cmds_root;
	std::string prm;
	comdat<trmsrv> cd;
	bool doecho;
	bool rlip;
	bool destroyme;
};
typedef trmsrv<smnet::inettnsrvp> inettrmsrv;
typedef shared_ptr<inettrmsrv> inettrmsrvp;

} // namespace smtrm
#endif
