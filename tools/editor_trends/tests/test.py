import configuration
settings = configuration.Settings()

from tests.mongodb import store

store.test_date()