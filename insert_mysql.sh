#!/bin/bash
mysql -uroot -psecure xml_image << EOF

LOAD DATA INFILE '/opt/public_html/xml_image/parse.mysql'
    INTO TABLE url
FIELDS TERMINATED BY ' ';
EOF
