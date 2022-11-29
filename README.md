# mediawiki-ldap

The goal of this container is to have an easily deploayble mediawiki with the extensions for LDAP already integrated.
I had to install mediawiki for multiple customers and got frustrated fiddling with the LDAP extensions everytime.

## Features

- Based on https://github.com/wikimedia/mediawiki-docker
- A docker-compose file to run directly
- integrated LDAPAuthentication2, LDAPAuthorization, LDAPGroups, LDAPProvider, LDAPSyncAll, LDAPUserInfo, PluggableAuth, Auth_remoteuser from official Mediawiki git
- All LDAP related settings are handled via .env file
- Custom LocalSettings.LDAP.php which includes all the tweaks for connecting to LDAP
- One-Klick installer / doensn't use the web based installation procedure
- persistent volumes, so you can edit LocalSettings.php & LocalSettings.LDAP.php
- 

## Usage

```
git clone https://github.com/sodema/mediawiki-ldap.git
cd mediawiki-ldap
docker build build/. -t mediawiki-ldap:latest
mv example.env .env
(vi/nano/???) .env
(vi/nano/???) docker-compose.yml
docker-compose up -d
docker logs -f mediawiki-db
docker logs -f mediawiki-app
./run_install.sh
```
Instead of building yourself you can also just `docker pull sodema/mediawiki-ldap:latest`

Copy example.env to .env and set your Variables  

Edit docker-compose.yml to fit your needs > Start Stack & Check with docker logs if everything is up > run ./run_install.sh > connect to your Wiki URL > Login with LDAP

## Environment Variables

These are the variables that need to be set:

```
LDAP_BASE=dc=yourdomain,dc=local
LDAP_SERVER_NAME=ldap.yourdomain.local
LDAP_SERVER_PORT=9636
LDAP_DOMAINNAME=yourdomain.local
LDAP_ENCTYPE=ssl
LDAP_USER_ATTR=uid
LDAP_BIND_USER="uid=readonly,cn=users,dc=yourdomain,dc=local"
LDAP_BIND_PASS="SecretBindPassword"
DB_HOST=mediawiki-db
DB_PORT=3306
DB_NAME=mediawiki
DB_USER=mediawiki
DB_PASS=SecretDBPass
WIKI_NAME=Yourdomain_Wiki
WIKI_ADMIN=Admin
WIKI_ADMIN_PASS=ChangeMe2022!
WIKI_URL=https://wiki.yourdomain.local
WIKI_LANG=de

```
