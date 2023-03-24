#!/bin/bash
(brew install php &&
brew install phpunit && 
brew install postgresql &&
brew services restart postgresql &&
brew install node &&
cd ./tests/playwright &&
npm i playwright &&
npm install -D @playwright/test)
