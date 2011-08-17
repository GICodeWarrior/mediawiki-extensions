# coding: utf8

import numpy as np
from scipy.stats import norm, chisqprob, normaltest
from scipy.optimize import curve_fit
from scipy.special import gamma
from cStringIO import StringIO
import datetime as dt
#from scikits.statsmodels.api import OLS

__all__ = ['Expon', 'PowerLaw', 'StretchedExpon' ]

class Parameter(object):
    '''
    Class for parameter descriptors. Works with ParameterMixin
    '''
    def __init__(self, name, attrlist):
        self.name = name  # parameter name
        for att in attrlist:
            if att.name == name:
                raise AttributeError('cannot add parameter {}'.format(name))
        attrlist.append(self)
    def __get__(self, instance, owner):
        if instance is not None:
            return instance.__dict__['_' + self.name]
        return self
    def __set__(self, instance, value):
        try:
            value, error = value
        except TypeError:
            value, error = value, None
        instance.__dict__['_' + self.name] = value
        instance.__dict__[self.name + '_err'] = error
    def __repr__(self):
        return '<Parameter {} at 0x{}>'.format(self.name, '%x' % id(self))

class ParameterMixin(object):
    '''
    Class that lets you look up all Parameter instances in __params__
    '''
    def itererrors(self):
        for p in self.__params__:
            yield self.__getattribute__(p.name + '_err')
    def errors(self):
        return list(self.itererrors())
    def iterparams(self):
        '''
        Returns an iterator over all parameters of this model
        '''
        for p in self.__params__:
            yield self.__getattribute__(p.name)
    def params(self):
        '''
        Returns a tuple of all parameters of this model
        '''
        return list(self.iterparams())
    def setparams(self, *args):
        '''
        Sets unset parameters of this model to *args. Parameters that already
        are associated a value will *NOT* be modified by this method.
        '''
        keyf = lambda p : self.__getattribute__(p.name) is None
        for p, a in zip(filter(keyf, self.__params__), args):
            setattr(self, p.name, a)

def _orNA(val, fmt='%8.5g'):
    if val is not None:
        return fmt % val
    else:
        return 'N/A'

class ParametricModel(ParameterMixin):
    '''
    Callable class with Parameter descriptors. Subclasses of ParametricModel
    ought define, as class attributes, any number of Parameter descriptors at the
    class level, together with a list (conventional name: `__params__'). See
    Parameter.__init__ on how to instantiate a Parameter descriptor.
    
    Subclassess ought also define two static methods: `func' and `init'. The
    first is the actual function that accepts an argument together with the same
    number of parameters as in __params__. The second is used to get initial
    estimates for the Levenberg-Marquardt leastsq minimizer used to fit this
    model. 

    From that point on, any instance of this class acts as the function `func'
    itself, with the only differences that it automatically performs partial
    application for those Parameter attributes that are being assigned a value.
    Example:

        # expon.func(x, A, B) is A * exp(B * x)
        >>> expon(1, -1, 2) = 0.73575888234288467 
        >>> expon.A = 2
        >>> expon(1, -1) = 0.73575888234288467
    '''
    def __init__(self, *args, **kwargs):
        keys = [p.name for p in self.__params__]
        for k in keys:
            if k not in kwargs:
                kwargs[k] = None
        kwargs.update(zip(keys, args)) # update the rightmost parameters only
        for k, v in kwargs.items():
            setattr(self, k, v)
        self.goftest = tuple([None] * 3)
        self.residtest = tuple([None] * 2)
        self.Rsquared = None
    def __call__(self, x, *args):
        '''
        See class method `func'
        '''
        fargs = self.params()
        N = len(filter(None, fargs))
        if N + len(args) > len(fargs):
            raise TypeError('{} accepts only {} '
                    'parameters'.format(self.__class__.__name__, len(fargs)))
        for a in args:
            idx = fargs.index(None)
            fargs[idx] = a
        fargs = tuple(fargs)
        return self.func(x, *fargs)
    def fit(self, x, y, ye, **kwargs):
        '''
        Fits this parametric model to observations (x_i, y_i). Uncertainty in
        the y-estimates can be specified with argument `ye'. Additional keyword
        arguments are passed to scipy.optimize.curve_fit which in turn passes
        them to scipy.optimize.leastsq.
        '''
        fp0 = self.init(x, y)
        fargs = self.params()
        p0 = []
        for a, p in zip(fargs, fp0):
            if a is None:
                p0.append(p)
        p0 = tuple(p0)
        return curve_fit(self, x, y, sigma=ye, p0=p0, **kwargs)
    def gof(self, x, y, ye):
        '''
        Computes GoF test statistics and other diagnostical tests

        Returns:
        --------
        - GoF test: Chi^2, p-value, and ddof
        - Normality of residuals: K^2 and p-value
        '''
        res = {}
        resid = y - self(x)
        chisq = np.sum(((resid) / ye) ** 2)
        ddof = len(x) - len(filter(None, self.errors())) # number of estimated parameters
        chisq_pvalue = chisqprob(chisq, ddof)
        gof = (chisq, chisq_pvalue, ddof)
        resid = normaltest(resid)
        ym = y.mean()
        SStot = np.sum((y - ym) ** 2)
        SSerr = np.sum((y - self(x)) ** 2)
        Rsquared = 1.0 - SSerr / SStot
# Besides being buggy, this test for homoscedasticity is supposed to work only
# for linear regressions, hence is not suited for our case, but I'll keep it
# here until I figure out an alternative. Remember to uncomment the import for
# OLS ontop.
#        regresults = OLS(resid ** 2, np.c_[x, x**2]).fit()
#        LM =regresults.rsquared 
#        LM_pvalue = chisqprob(LM, len(x) - ddof)
#        white = (LM, LM_pvalue)
#        return gof, resid, white 
        return gof, resid, Rsquared
    def __str__(self):
        name = self.__class__.__name__
        prep = []
        for p in self.params():
            if p is not None:
                prep.append('%3.4g' % p)
            else:
                prep.append('*')
        return '{}({})'.format(name, ','.join(prep))
    def __repr__(self):
            return '<{} object at 0x{}>'.format(str(self), '%x' % id(self))
    def summary(self, **kwargs):
        '''
        Returns a summary of this model
        '''
        s = StringIO()
        print >> s, ''
        print >> s, 'General information'
        print >> s, '-------------------'
        print >> s, 'model: %s' % self.name.capitalize()
        print >> s, 'date: %s' % dt.datetime.now()
        for item in kwargs.items():
            print >> s, '{}: {}'.format(*map(str, item))
        print >> s, ''
        print >> s, 'Model parameters'
        print >> s, '----------------'
        for p, val, err in zip(self.__params__, self.params(), self.errors()):
            print >> s, '{}: {} ± {}'.format(p.name, _orNA(val), _orNA(err))
        chi, p, ddof = self.goftest
        print >> s, ''
        print >> s, 'Fit results'
        print >> s, '-----------'
        print >> s, 'Goodness-of-fit: Chi-squared = {}, p = {}, ddof = {}'.format(
                _orNA(chi, '%5.2f'), _orNA(p, '%8.4e'), _orNA(ddof, '%d'))
        D, p = self.residtest
        print >> s, 'Normality of residuals: K-squared = {}, p = {}'.format(
                _orNA(D, '%5.2f'), _orNA(p, '%8.4e'))
        print >> s, 'Coefficient of Determination: {}'.format(
                _orNA(self.Rsquared, '%5.2f'))
        return s.getvalue()

class Expon(ParametricModel):
    '''
    y = A * exp( -(x / B)) + C
    '''
    __params__ = []
    A = Parameter('A', __params__)
    B = Parameter('B', __params__)
    C = Parameter('C', __params__)
    name = 'exponential'
    @staticmethod
    def func(x, a, b, c):
        return a * np.exp(-(x / b)) + c
    @staticmethod
    def init(x, y):
        a0 = y[np.argmin(np.abs(x))]  # estimate for A = f(0)
        b0 = x.max() / 10.0
        c0 = y.min()
        return (a0, b0, c0)
    def fit(self, x, y, ye, **kwargs):
        return super(Expon, self).fit(x, y, ye, **kwargs)

class StretchedExpon(ParametricModel):
    '''
    y = A * exp (-(t / tau) ** beta) + C
    '''
    __params__ = []
    A = Parameter('A', __params__)
    tau = Parameter('tau', __params__)
    beta = Parameter('beta', __params__)
    C = Parameter('C', __params__)
    name = 'stretched exponential'
    @staticmethod
    def func(x, a, tau, beta, c):
        return a * np.exp(- (x / tau) ** beta) + c
    @staticmethod
    def init(x, y):
        a0 = y[np.argmin(np.abs(x))]  # estimate for A = f(0)
        tau0 = x.max() / 10.0
        c0 = y.min()
        return (a0, tau0, 0.5, c0)
    def fit(self, x, y, ye, **kwargs):
        return super(StretchedExpon, self).fit(x, y, ye, **kwargs)
    def summary(self, **kwargs):
        mrt = self.mrt(self.tau, self.beta)
        kwargs['Mean relaxation time <tau>'] = '%5.2f days' % mrt
        return super(StretchedExpon, self).summary(**kwargs)
    def mrt(self, tau, beta):
        return (tau / beta) * gamma(beta ** -1)

class PowerLaw(ParametricModel):
    '''
    y = A * x ** B
    '''
    __params__ = []
    A = Parameter('A', __params__)
    B = Parameter('B', __params__)
    name = 'power-law'
    @staticmethod
    def func(x, a, b):
        return a * x ** b
    @staticmethod
    def init(x, y):
        return (1, y.ptp()/x.ptp())
# NR says this code is more robust against roundoff errors, but presently it
# does not work. Bummer.
#    def fit(self, x, y, ye, **kwargs):
#        x, y, ye = self._removezeros(x, y, ye)
#        ye = ye / y
#        x = np.log(x)
#        y = np.log(y)
#        S = np.sum(ye ** -1)
#        Sx = np.sum(x / ye)
#        Sy = np.sum(y / ye)
#        t = (ye ** -1) * (x - Sx / S)
#        Stt = np.sum(t ** 2)
#        b = Stt ** -1 * np.sum((y * t) / ye)
#        a = np.exp((Sy - Sx * b) / S)
#        a_var = S ** -1 * (1 + Sx ** 2 / (S * Stt))
#        b_var = Stt ** -1
#        ab_covar = - Sx / Stt
#        pcov = np.asarray([[a_var, ab_covar], [ab_covar, b_var]])
#        return (a, b), pcov
    def fit(self, x, y, ye, **kwargs):
        '''
        Fit by linear least squares of log-transformed data
        '''
        x, y, ye = self._removezeros(x, y, ye)
        ye = (ye / y) ** 2
        x = np.log(x)
        y = np.log(y)
        S = np.sum(ye ** -1)
        Sx = np.sum(x / ye)
        Sy = np.sum(y / ye)
        Sxx = np.sum(x ** 2 / ye)
        Sxy = np.sum((x * y) / ye)
        Delta = S * Sxx - Sx ** 2
        a = np.exp((Sxx * Sy  - Sx * Sxy) / Delta)
        b = (S * Sxy - Sx * Sy) / Delta
        a_var = Sxx / Delta
        b_var = S / Delta
        ab_covar = - Sx / Delta
        pcov = np.asarray([[a_var, ab_covar], [ab_covar, b_var]])
        return (a, b), pcov
    def gof(self, x, y, ye):
        '''
        GoF of linear least squares of log-transformed data
        '''
        x, y, ye = self._removezeros(x, y, ye)
        ye = (ye / y)
        x = np.log(x)
        y = np.log(y)
        yp = np.log(self.A) + self.B * x
        chisq = np.sum(((yp - y) / ye) ** 2)
        ddof = len(x) - len(filter(None, self.errors())) # number of estimated parameters
        chisq_pvalue = chisqprob(chisq / 2., ddof)
        resid = normaltest(y - yp)
        ym = y.mean()
        SStot = np.sum((y - ym) ** 2)
        SSerr = np.sum((y - yp) ** 2)
        Rsquared = 1.0 - SSerr / SStot
        return (chisq, chisq_pvalue, ddof), resid, Rsquared
    @staticmethod
    def _removezeros(x, y, ye):
        idx = x > 0
        return x[idx], y[idx], ye[idx]

if __name__ == '__main__':

    import matplotlib.pyplot as pp
    import scale

    model = StretchedExpon()
    
    a = 2
    tau = 100
    beta = .5
    c = 0.
    s = 0.1
    xmax = 1000
    x = np.linspace(0, xmax, 50)
    y = model(x, a, tau, beta, c) + np.random.randn(len(x)) * s
    
    pest, pcov = model.fit(x, y, s)

    model.setparams(*zip(pest, np.sqrt(np.diag(pcov))))

    xx = np.linspace(0, xmax, 1000)
    yy = model(xx)
    
    pp.errorbar(x, y, s, fmt='. ', color='k', ecolor='none', label='data')
    pp.plot(xx, yy, 'r-', label='Stretch. Exp. fit')
    pp.xscale('power', exponent=beta)
    pp.yscale('log')

    pp.legend()
    gof, resid, Rsquared = model.gof(x, y, s)
    model.goftest = gof
    model.residtest = resid
    model.Rsquared = Rsquared
    print model.summary()
    chi, p, ddof = gof
    pp.text(200, 1, r'$\chi^2 = %.2f,\, p-{\rm value} = %5.2g,\,'
            r'{\rm ddof} = %d,\, R^2 = %.2f$'
            % (chi,p,ddof, Rsquared), 
            fontsize=16)
    pp.show()
