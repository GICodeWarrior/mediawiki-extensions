from distutils.core import setup

setup(
        name='lifecycle',
        description='WMF summer of research project',
        version='0.0.0',
        author='Giovanni Luca Ciampaglia',
        author_email='gciampaglia@wikimedia.org',
        packages=['lifecycle'],
        scripts=[
            'fetchrates', 
            'fitting', 
            'relax', 
            'mkcohort',
        ]
)
