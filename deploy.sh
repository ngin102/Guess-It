#!/bin/bash
(zip -r guess-it.zip . -x ".*" -x "__MACOSX" && mv guess-it.zip ~/Desktop && cd ~/Desktop && mkdir ~/Desktop/temp && mv guess-it.zip ~/Desktop/temp && cd temp && unzip guess-it.zip && rm guess-it.zip && ./setup.sh && ./bin/db/create && ./server.sh)
