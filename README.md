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
LDAP_BASE=dc=yourdomain,dc=local                                  # BASE DN
LDAP_SERVER_NAME=ldap.yourdomain.local                            # FQDN of your LDAP server
LDAP_SERVER_PORT=9636                                             # Port of your LDAP server
LDAP_DOMAINNAME=yourdomain.local                                  # Name of your domain
LDAP_ENCTYPE=ssl                                                  # Encryption type 'ldapi', 'ssl', 'tls', or 'clear'
LDAP_USER_ATTR=uid                                                # Attribute to identify user 'uid' or 'cn'
LDAP_BIND_USER="uid=readonly,cn=users,dc=yourdomain,dc=local"     # User to bind to LDAP
LDAP_BIND_PASS="SecretBindPassword"                               # Bind Password
DB_HOST=mediawiki-db                                              # Hostname of DB server
DB_PORT=3306                                                      # DB server Port
DB_NAME=mediawiki                                                 # Name of your Wiki DB
DB_USER=mediawiki                                                 # DB User
DB_PASS=SecretDBPass                                              # DB Password
WIKI_NAME=Yourdomain_Wiki                                         # Name of your wiki
WIKI_ADMIN=Admin                                                  # Username of local admin (local login must be enabled first)
WIKI_ADMIN_PASS=ChangeMe2022!                                     # Password for local admin
WIKI_URL=https://wiki.yourdomain.local                            # URL and Protocol where your Wiki sits (if behind reverse proxy choose https)
WIKI_LANG=de                                                      # Language for your wiki

```
