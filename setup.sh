#!/bin/bash
(brew install php &&
brew install phpunit && 
brew install postgresql &&
brew services restart postgresql)
