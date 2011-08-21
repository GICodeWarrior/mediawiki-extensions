import numpy as np
from scipy.interpolate import splrep, splev

def spsmooth(x, y, ye, **kwargs):
    ''' 
    Finds the best spline smoothing factor by leave-one-out cross validation

    Additional keyword arguments are passed to splrep (e.g. k for the degree)
    '''

    best = []
    N = len(x)

    smax = 10
    ss = smax / 100.0
    slist = list(np.arange(ss, smax, ss))

    for i in xrange(N):

        train_idx = np.arange(N) != i
        test_idx = True - train_idx

        train_x = x[train_idx]
        train_y = y[train_idx]
        train_w = ye[train_idx] ** -1

        test_x = x[test_idx]
        test_y = y[test_idx]
        
        s_best = None
        err_best = np.inf
        
        for s in slist:
            tck = splrep(train_x, train_y, w=train_w, s=s, **kwargs)
            err = np.sqrt((splev(test_x, tck) - test_y) ** 2)
            
            if err < err_best:
                s_best = s
                err_best = err

        best.append(s_best)

    return np.mean(best)
        
           
