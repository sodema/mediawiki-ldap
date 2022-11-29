# mediawiki-ldap

The goal of this container is to have an easily deploayble mediawiki with the extensions for LDAP already integrated.
I had to install mediawiki for multiple customers and got frustrated fiddling with the LDAP extensions everytime.

## Features

- Based on https://github.com/wikimedia/mediawiki-docker
- integrated LDAPAuthentication2, LDAPAuthorization, LDAPGroups, LDAPProvider, LDAPSyncAll, LDAPUserInfo, PluggableAuth, Auth_remoteuser from official Mediawiki git
- All LDAP related settings are handled via .env file
- One-Klick installer no need to use the web based installation procedure
- persistent Volumes
-


cp example.env .env > set Variables > Build Container > Start Stack > run ./run_install.sh > connect to your Wiki URL > Login with LDAP
