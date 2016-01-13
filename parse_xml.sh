#!/bin/sh
file="$1"
xgrep -x "//pixel_height" $file | awk -vRS="</pixel_height>" '{gsub(/.*<pixel_height>/,"");print}' > pixel.file 
xgrep -x "//image_url_http" $file | awk -vRS="</image_url_http>" '{gsub(/.*<image_url_http>/,"");print}' >> url.file
head -n -4 pixel.file > temp.file ; mv temp.file pixel.file
sleep 2
head -n -4 url.file > temp.file ; mv temp.file url.file

