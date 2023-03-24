#!/bin/bash
(./setup.sh && phpunit tests && cd tests/playwright && npx playwright test)