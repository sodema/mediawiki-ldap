#!/bin/bash

# start the installscript and create LocalSettings.php
# set CONT_NAME to your container_name variable from docker-compose.yml

CONT_NAME=mediawiki-app

docker exec $CONT_NAME /opt/mediawiki/install_wiki.sh

