#ifndef SM_SMTRM_HXX_INCLUDED_
#define SM_SMTRM_HXX_INCLUDED_

#include "smstdinc.hxx"

namespace smtrm {

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
		term.wrtln(format("%% [W] %s") % msg);
	}
	void inform (std::string const & msg) const {
		term.wrtln(format("%% [I] %s") % msg); 
	}
	void error (std::string const & msg) const {
		term.wrtln(format("%% [E] %s") % msg);
	}
	void wrtln (std::string const & msg) const {
		term.wrtln(msg);
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
		std::string s;
		term.read(s);
		return s;
	}
	void rst(void) {
		ps.resize(0);
	}
private:
	tt& term;
	std::vector<std::string> ps;
};

template<class tt>
class handler {
public:
	virtual void execute (comdat<tt> const&) = 0;
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

#include "../smstdrt.cxx"

template<class tt>
struct tmcmds : public smutl::singleton<tmcmds<tt> > {
	tmcmds() {
		stdrt.install("show version", cmd_show_version<tt>(), "Show software version");
	}
	handler_node<tt> stdrt;
};

template<class intft>
class trmsrv {
public:
	trmsrv(intft& intf_)
	: intf(intf_)
	, cmds_root(instance<tmcmds<trmsrv> >()->stdrt)
	, prm("servmon> ")
	, cd(*this)
	{
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
	
	void run(void) {
		init();
		for (;;) {
			u_char c = intf.rd1();
			binds[c](c);
		}	
	}

	void wrtln(std::string const& s = "") {
		wrt(s); wrt("\r\n");
	}
	void wrt(u_char c) {
		intf.wrt(&c, 1);
	}
	void wrt(std::string const& s) {
		intf.wrt(s);
	}
	bool prc_ign(char) {
		return true;
	}
	bool prc_nl(char) {
		std::cerr << "read: [" << ln << "]\n";
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
		matches[0]->terminal->execute(cd);
	
end:
		init();
		return true;
	}
	bool prc_char(char c) {
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
		wrt(c);
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
		wrt(' ');
		thisword = "";
		ln += comp + c;
		return true;
	}
	bool prc_help(char) {
		bool waswild;
		wrtln("?");
		std::vector<handler_node_t *> matches = hstack[0]->find_matches(thisword, waswild);
		for (typename std::vector<handler_node_t *>::iterator it = matches.begin(),
			 end = matches.end(); it != end; ++it) {
			wrtln(str(format("  %s %s") % (**it).name % (**it).help));
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
		init();
		return true;
	}

	void init(void) {
		hstack.resize(1);
		hstack[0] = &cmds_root;
		cd.rst();
		ln = thisword = "";
		intf.wrt(prm);
	}

private:
	intft& intf;
	std::map<u_char, boost::function<bool (char)> > binds;
	// bookkeeping for parser
	std::string ln;
	std::string thisword;
	typedef handler_node<trmsrv> handler_node_t;
	std::vector<handler_node_t *> hstack;
	handler_node_t& cmds_root;
	std::string prm;
	comdat<trmsrv> cd;
};

} // namespace smtrm
#endif
