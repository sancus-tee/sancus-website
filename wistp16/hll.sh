#!/bin/bash
TERM="xtermc" vim -f +"syn on" +"set nu" +"let html_use_css=\"1\"" +"so ./2html.vim" +"w! $1.html" +"q" +"q" $1
