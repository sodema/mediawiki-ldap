
FROM mediawiki:1.35.8
MAINTAINER david.martin@sodema.de

RUN apt-get update && apt-get -y install libldb-dev git && rm -rf /var/lib/apt/lists/*

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions ldap

RUN git clone --branch REL1_35 https://github.com/wikimedia/mediawiki-extensions-LDAPAuthentication2.git /var/www/html/extensions/LDAPAuthentication2
RUN git clone --branch REL1_35 https://github.com/wikimedia/mediawiki-extensions-LDAPAuthorization.git /var/www/html/extensions/LDAPAuthorization
RUN git clone --branch REL1_35 https://github.com/wikimedia/mediawiki-extensions-LDAPGroups.git /var/www/html/extensions/LDAPGroups
RUN git clone --branch REL1_35 https://github.com/wikimedia/mediawiki-extensions-LDAPProvider.git /var/www/html/extensions/LDAPProvider
RUN git clone --branch REL1_35 https://github.com/wikimedia/mediawiki-extensions-LDAPSyncAll.git /var/www/html/extensions/LDAPSyncAll
RUN git clone --branch REL1_35 https://github.com/wikimedia/mediawiki-extensions-LDAPUserInfo.git /var/www/html/extensions/LDAPUserInfo
RUN git clone --branch REL1_35 https://github.com/wikimedia/mediawiki-extensions-PluggableAuth.git /var/www/html/extensions/PluggableAuth
RUN git clone --branch REL1_35 https://github.com/wikimedia/mediawiki-extensions-Auth_remoteuser.git /var/www/html/extensions/Auth_remoteuser
RUN git clone --branch REL1_35 https://github.com/wikimedia/mediawiki-extensions-TemplateStyles.git /var/www/html/extensions/TemplateStyles




RUN set -eux; \
        mkdir -p /log/mediawiki; \
        chown -R www-data:www-data /log/mediawiki


RUN touch '/log/mediawiki/resourceloader.log'
RUN touch '/log/mediawiki/exception.log'
RUN touch '/log/mediawiki/exception.json'
RUN touch '/log/mediawiki/LDAPAuthentication2.log'
RUN touch '/log/mediawiki/LDAPAuthorization.log'
RUN touch '/log/mediawiki/LDAPGroups.log'
RUN touch '/log/mediawiki/LDAPUserInfo.log'
RUN touch '/log/mediawiki/LDAPProvider.log' 
RUN touch '/log/mediawiki/PluggableAuth.log' 
RUN touch '/log/mediawiki/LDAPSyncAll.log'
RUN touch '/log/mediawiki/Auth_remoteuser.log'
RUN touch '/log/mediawiki/ldap.log' 
RUN touch '/log/mediawiki/mw_debug.log'

RUN chown -R www-data:www-data /log/mediawiki && chmod -R 0660 /log/mediawiki

RUN set -eux; \
        mkdir -p /opt/mediawiki; \
        chown -R www-data:www-data /log/mediawiki

RUN set -eux; \
        mkdir -p /var/www/html/settings.d;

ADD include/settings.d /opt/mediawiki/settings.d/
ADD include/install_wiki.sh /opt/mediawiki/
ADD include/enable_debug.sh /opt/mediawiki
ADD include/disable_debug.sh /opt/mediawiki
RUN chmod +x /opt/mediawiki/install_wiki.sh
