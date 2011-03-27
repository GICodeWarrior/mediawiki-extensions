import hashlib
import random
import timeit
from functools import partial

def create_string():
    string =''
    for x in xrange(10240):
        rnd = random.randrange(0, 127)
        string+=chr(rnd)
    return string

def create_hash(hash, string):
    hash.update(string)
    return hash.hexdigest()


def setup(alg):
    string = create_string()
    hash = getattr(hashlib, alg)
    hash = hash()
    id = create_hash(hash, string)
    

def hashstd():
    string = create_string()
    id = hash(string)
    
if __name__ == '__main__':
    algorithms = ['md5','sha1','sha224','sha256','sha384','sha512']
    t = timeit.Timer('hashstd', "from __main__ import hashstd")
    print '%s\t%s' %('hash', t.timeit(number=500))

    
    for alg in algorithms:
        t = timeit.Timer(partial(setup, alg), "from __main__ import setup")
        print '%s\t%s' %(alg, t.timeit(number=500))

