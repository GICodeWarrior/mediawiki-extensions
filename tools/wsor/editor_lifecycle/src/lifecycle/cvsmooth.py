''' non parametric function estimation with smoothing splines '''

'''
Copyright (C) 2011 GIOVANNI LUCA CIAMPAGLIA, GCIAMPAGLIA@WIKIMEDIA.ORG
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
http://www.gnu.org/copyleft/gpl.html
'''

import sys

import numpy as np
from scipy.interpolate import UnivariateSpline
from scipy.optimize import fmin_tnc
import scipy.optimize.tnc as tnc
from multiprocessing import Pool
from multiprocessing.pool import ApplyResult

def spsmooth(x, y, ye, **kwargs):
    ''' 
    Finds the best spline smoothing factor using leave-one-out cross validation

    Additional keyword arguments are passed to UnivariateSpline (e.g. k for the degree)
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
            spl = UnivariateSpline(train_x, train_y, w=train_w, s=s)
            err = np.sqrt((spl(test_x) - test_y) ** 2)
            
            if err < err_best:
                s_best = s
                err_best = err

        best.append(s_best)

    return np.mean(best)

def _find_peak(x, y, ye, k=3, s=None):
    spl = UnivariateSpline(x, y, ye ** -1, k=k, s=s)
    f = lambda k : -spl(k)
    fprime = np.vectorize(lambda k : - spl.derivatives(k)[1])
    xp_best = None
    yp_best = -np.inf
    bounds = [(x.min(), x.max())]
    for i in xrange(5):
        x0 = (x.ptp() * np.random.rand() + x.min(),)
        xp, nfeval, rc = fmin_tnc(f, x0, fprime=fprime, bounds=bounds,
                messages=tnc.MSG_NONE)
        xp = xp.item()
        yp = spl(xp)
        if yp >= yp_best:
            xp_best = xp
            yp_best = yp
    return xp_best, yp_best.item()

def _init():
    import signal
    signal.signal(signal.SIGINT, signal.SIG_IGN)
    import warnings
    warnings.simplefilter("ignore", category=UserWarning)

def find_peak(x, y, ye, k=3,reps=10000):
    '''
    Finds maximum in time series (x_i, y_i) using smoothing splines

    Parameters
    ----------
    x,y - data
    ye  - standard errors estimates
    k   - spline degree (must be <= 5)

    Returns
    -------
    xp      - maximum of the smoothing spline
    xperr   - uncertainty in the maximum
    s       - the smoothing factor (either the one passed, or the one estimated)
    '''
    # compute the peak
    s = spsmooth(x, y, ye, k=k)
    xp, yp = _find_peak(x, y, ye, k=k, s=s)
    
    # compute uncertainty by bootstrap
    results = []
    N = len(x)
    pool = Pool()
    spl = UnivariateSpline(x, y, ye ** -1, k=k, s=s)
    yf = spl(x)
    err = y - yf
    kwds = {'k' : k, 's' : s}
    try:
        for i in xrange(reps):
            idx = np.random.randint(0, len(x), len(x))
            ys = yf + err[idx]
            res = pool.apply_async(_find_peak, args=(x, ys, ye), 
                    kwds=kwds)
            results.append(res)
        results = np.asarray(map(ApplyResult.get, results))
        if len(results):
            xerr = np.std(results[:,0], ddof=1, axis=0)
            # geometric standard deviation
            yerr = np.exp(np.std(np.log(results[:,1]), ddof=1))
        else:
            xerr, yerr = np.nan, np.nan
    finally:
        pool.terminate()
        pool.join()
    return (xp, yp), (xerr, yerr), s, results
