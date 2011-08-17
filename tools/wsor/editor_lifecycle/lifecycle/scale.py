from matplotlib.scale import ScaleBase, register_scale
from matplotlib.transforms import Transform, nonsingular
from matplotlib.ticker import LinearLocator, Formatter
from math import ceil, floor
import numpy as np

class PowerScale(ScaleBase):
    name ='power'
    def __init__(self, axis, **kwargs):
        ScaleBase.__init__(self)
        exponent = kwargs.pop('exponent')
        if exponent <= 0:
            raise ValueError('exponent must be positive')
        self.exponent = exponent
    def get_transform(self):
        return PowerTransform(self.exponent)
    def set_default_locators_and_formatters(self, axis):
        axis.set_major_locator(PowerLocator(self.exponent))
        axis.set_major_formatter(PowerFormatter(self.exponent))
        axis.set_minor_formatter(PowerFormatter(self.exponent))

class PowerLocator(LinearLocator):
    def __init__(self, exponent, **kwargs):
        LinearLocator.__init__(self, **kwargs)
        self.exponent = exponent
        self.numticks = 5
    def __call__(self):
        vmin, vmax = self.axis.get_view_interval()
        vmin, vmax = nonsingular(vmin, vmax, expander = 0.05)
        vmin = vmin ** self.exponent
        vmax = vmax ** self.exponent
        if vmax<vmin:
            vmin, vmax = vmax, vmin

        ticklocs = np.linspace(vmin, vmax, num=self.numticks, endpoint=True)
        return self.raise_if_exceeds(ticklocs ** (1.0 / self.exponent))

class PowerFormatter(Formatter):
    def __init__(self, exponent):
        self.exponent = exponent
    def __call__(self, x, pos=None):
        return u'%.2g' % (x ** (1.0 / self.exponent))

class PowerTransform(Transform):
    input_dims = 1
    output_dims = 1
    is_separable = True
    def __init__(self, exponent):
        Transform.__init__(self)
        self.exponent = exponent
    def transform(self, a):
        return a ** self.exponent
    def inverted(self):
        return PowerTransform(1.0 / self.exponent)

register_scale(PowerScale)

if __name__ == '__main__':
    from pylab import *
    import numpy as np
    tau = 20
    beta = 0.5
    x = np.linspace(0,100, num=10)
    y = np.exp(-(x / tau) ** beta) 
    plot(x, y, 'o ', mfc='none', mew=2)
    xscale('power', exponent=beta)
    yscale('log', basey=10)
    show()
