#!/bin/sh

# USEAGE:
# cleanlog  /var/www/html/basic/storage/logs
find $1 -mtime +30 -name "*.log" -exec rm -rf {} \;