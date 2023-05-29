#!/bin/bash
(zip -r guess-it.zip . -x ".*" -x "__MACOSX" && mv guess-it.zip ~/Desktop && rm -r ~/Desktop/temp* && mkdir ~/Desktop/temp && cd ~/Desktop && mv guess-it.zip ~/Desktop/temp && cd ~/Desktop/temp && unzip guess-it.zip && rm guess-it.zip && ./setup.sh && ./bin/db/create && ./server.sh)
