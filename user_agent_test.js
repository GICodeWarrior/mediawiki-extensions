/* 
  User Agent Tests

  This is an incomplete test set. As you hit issues, please add strings that
  may be problematic.

  Written by Hampton Catlin 
*/

var regex = /(5.0[ ]?\(..[^a].*Mobile.*Safari|webOS|NetFront|Opera Mini|SEMC-Browser|PlayStation Portable|Nintendo Wii|BlackBerry)/;

var runTests = function() {
  // iPhone
  shouldRedirect("Mozilla/5.0 (iPhone; U; CPU iPhone OS 2_2 like Mac OS X; en-us) AppleWebKit/525.18.1 (KHTML, like Gecko) Version/3.1.1 Mobile/5G77 Safari/525.20");
  // Android on HTC Desire
  shouldRedirect("Mozilla/5.0 (Linux; U; Android 2.1-update1; de-de; HTC Desire 1.19.161.5 Build/ERE27) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17");
  // Nintendo Wii
  shouldRedirect("Opera/9.30 (Nintendo Wii; U; ; 2047-7;pt-br)");
  // Netfront PDA
  shouldRedirect("Mozilla/5.0 (PDA; NF35WMPRO/1.0; like Gecko) NetFront/3.5");
  // Palm Pre
  shouldRedirect("Mozilla/5.0 (webOS/1.0; U; en-US) AppleWebKit/525.27.1 (KHTML, like Gecko) Version/1.0 Safari/525.27.1 Pre/1.0");
  // Safari on Mac OS X
  shouldIgnore("Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_6; en-us) AppleWebKit/533.19.4 (KHTML, like Gecko) Version/5.0.3 Safari/533.19.4");
  // Chrome on OS X
  shouldIgnore("Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_6; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.237 Safari/534.10");
  // iPad
  shouldIgnore("Mozilla/5.0(iPad; U; CPU iPhone OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B314 Safari/531.21.10");
  // iPad alt
  shouldIgnore("Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.10");
  // iPhone 4
  shouldRedirect("Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.05 Mobile/8A293 Safari/6531.22.7");
  // Firefox
  shouldIgnore("Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:2.0b9pre) Gecko/20101228 Firefox/4.0b9pre")
};

var doesMatch = function(user_agent) {
	return regex.test(user_agent);
};

var runTest = function(user_agent, should_be) {
  var result = doesMatch(user_agent);
  if(result == should_be) {
    print("OK");
  } else {
    print("FAIL: '" + user_agent + "'");
  }
};

var shouldRedirect = function(user_agent) {
	runTest(user_agent, true);
};

var shouldIgnore = function(user_agent) {
	runTest(user_agent, false);
};

runTests();
/* 
  User Agent Tests

  This is an incomplete test set. As you hit issues, please add strings that
  may be problematic.

  Written by Hampton Catlin 
*/

var regex = /(Mobile.*Safari|webOS|NetFront|Opera Mini|SEMC-Browser|PlayStation Portable|Nintendo Wii|BlackBerry)/;

var runTests = function() {
  // iPhone
  shouldRedirect("Mozilla/5.0 (iPhone; U; CPU iPhone OS 2_2 like Mac OS X; en-us) AppleWebKit/525.18.1 (KHTML, like Gecko) Version/3.1.1 Mobile/5G77 Safari/525.20");
  // Android on HTC Desire
  shouldRedirect("Mozilla/5.0 (Linux; U; Android 2.1-update1; de-de; HTC Desire 1.19.161.5 Build/ERE27) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17");
  // Nintendo Wii
  shouldRedirect("Opera/9.30 (Nintendo Wii; U; ; 2047-7;pt-br)");
  // Netfront PDA
  shouldRedirect("Mozilla/5.0 (PDA; NF35WMPRO/1.0; like Gecko) NetFront/3.5");
  // Palm Pre
  shouldRedirect("Mozilla/5.0 (webOS/1.0; U; en-US) AppleWebKit/525.27.1 (KHTML, like Gecko) Version/1.0 Safari/525.27.1 Pre/1.0");
  // Safari on Mac OS X
  shouldIgnore("Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_6; en-us) AppleWebKit/533.19.4 (KHTML, like Gecko) Version/5.0.3 Safari/533.19.4");
  // Chrome on OS X
  shouldIgnore("Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_6; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.237 Safari/534.10");
}

var doesMatch = function(user_agent) {
  return regex.test(user_agent);
}

var runTest = function(user_agent, should_be) {
  var result = doesMatch(user_agent);
  if(result == should_be) {
    print("OK")
  } else {
    print("FAIL: '" + user_agent + "'")
  }
}

var shouldRedirect = function(user_agent) {
  runTest(user_agent, true);
}

var shouldIgnore = function(user_agent) {
  runTest(user_agent, false);
}

runTests();