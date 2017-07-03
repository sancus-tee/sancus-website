#!/bin/bash

rsync $@ -avs --exclude=.git --exclude=.gitignore --exclude=*~ ./ job@waldorf:/cw/dnetw3/software/sancus/
