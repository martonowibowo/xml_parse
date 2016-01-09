#!/bin/sh
file="$1"
xgrep -x "//image_url_http" $file | awk -vRS="</image_url_http>" '{gsub(/.*<image_url_http>/,"");print}' > parse.file
xgrep -x "//image_url_https" $file | awk -vRS="</image_url_https>" '{gsub(/.*<image_url_https>/,"");print}' >> parse.file
sleep 1
cat parse.file | grep http > parse.mysql
