#!/bin/bash
(zip -r project-snm.zip . -x ".*" -x "__MACOSX" && mv project-snm.zip ~/Desktop && cd ~/Desktop && mkdir ~/Desktop/temp && mv project-snm.zip ~/Desktop/temp && cd temp && unzip project-snm.zip && rm project-snm.zip && ./setup.sh && ./bin/db/create && ./server.sh)
