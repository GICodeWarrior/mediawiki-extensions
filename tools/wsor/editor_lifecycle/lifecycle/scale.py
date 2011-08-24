''' power-linear axes scale for matplotlib '''


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
