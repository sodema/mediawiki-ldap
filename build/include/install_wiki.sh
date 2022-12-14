#!/bin/bash

php maintenance/install.php --dbname=$DB_NAME --dbserver=$DB_HOST --installdbuser=$DB_USER --installdbpass=$DB_PASS --dbuser=$DB_USER --dbpass=$DB_PASS --server=$WIKI_URL --scriptpath=$WIKI_PATH --lang=$WIKI_LANG --pass=$WIKI_ADMIN_PASS $WIKI_NAME $WIKI_ADMIN


for i in /opt/mediawiki/settings.d/*
do
  ext=$(basename $i)
  base='require_once "$IP/settings.d/'
  end='";'
  echo $base$ext$end >> /var/www/html/LocalSettings.php
  cp $i /var/www/html/settings.d/
  echo "$ext activated"
done


sed -i "s/LDAP_DOMAINNAME/$LDAP_DOMAINNAME/g" /var/www/html/settings.d/LocalSettings.LDAP.php
sed -i "s/LDAP_SERVER_NAME/$LDAP_SERVER_NAME/g" /var/www/html/settings.d/LocalSettings.LDAP.php
sed -i "s/LDAP_SERVER_PORT/$LDAP_SERVER_PORT/g" /var/www/html/settings.d/LocalSettings.LDAP.php
sed -i "s/LDAP_ENCTYPE/$LDAP_ENCTYPE/g" /var/www/html/settings.d/LocalSettings.LDAP.php
sed -i "s/LDAP_BIND_USER/$LDAP_BIND_USER/g" /var/www/html/settings.d/LocalSettings.LDAP.php
sed -i "s/LDAP_BIND_PASS/$LDAP_BIND_PASS/g" /var/www/html/settings.d/LocalSettings.LDAP.php
sed -i "s/LDAP_BASE/$LDAP_BASE/g" /var/www/html/settings.d/LocalSettings.LDAP.php
sed -i "s/LDAP_USER_ATTR/$LDAP_USER_ATTR/g" /var/www/html/settings.d/LocalSettings.LDAP.php
sed -i "s/WIKI_LANG/$WIKI_LANG/g" /var/www/html/settings.d/LocalSettings.LDAP.php

php maintenance/update.php --quick
