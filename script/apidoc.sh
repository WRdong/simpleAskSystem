#!/bin/bash
path=$(dirname $(cd $(dirname $0); pwd))
cd ${path}/apidoc

npm run build
