#!/bin/bash
(zip -r project-snm.zip . -x ".*" -x "__MACOSX" && mv project-snm.zip ~/Desktop && rm -r ~/Desktop/temp* && mkdir ~/Desktop/temp && cd ~/Desktop && mv project-snm.zip ~/Desktop/temp && cd ~/Desktop/temp && unzip project-snm.zip && rm project-snm.zip && ./setup.sh && ./bin/db/create && ./server.sh)
