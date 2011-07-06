from StringIO import StringIO
from nose.tools import eq_
from ..file_wrapper import FileWrapper

def test_file_wrapper():
	pre  = "foo\nbar\nbaz\n"
	fp   = StringIO("herp\nderp\n")
	post = "foobar\n"
	concat = pre + fp.getvalue() + post
	
	fw = FileWrapper(fp, pre, post)
	
	eq_(
		fw.read(), 
		concat
	)
	
	fp     = StringIO("herp\nderp\n")
	
	fw = FileWrapper(fp, pre, post)
	
	for i in range(0, 20):
		eq_(fw.read(5), concat[i*5:(i+1)*5])
	
