<?php
# debug - set to true for debugging
$wgShowExceptionDetails = false;
$wgDebugToolbar = false;
$wgShowDebug = false;
$wgDevelopmentWarnings = false;

$wgDebugLogGroups                 = array(
     'resourceloader'             => '/log/mediawiki/resourceloader.log',
     'exception'                  => '/log/mediawiki/exception.log',
     'exception-json'             => '/log/mediawiki/exception.json',
     'LDAPAuthentication2'        => '/log/mediawiki/LDAPAuthentication2.log',
     'LDAPAuthorization'          => '/log/mediawiki/LDAPAuthorization.log',
     'LDAPGroups'                 => '/log/mediawiki/LDAPGroups.log',
     'LDAPUserInfo'               => '/log/mediawiki/LDAPUserInfo.log',
     'LDAPProvider'               => '/log/mediawiki/LDAPProvider.log',
     'LDAPSyncAll'                => '/log/mediawiki/LDAPSyncAll.log',
     'Auth_remoteuser'            => '/log/mediawiki/Auth_remoteuser.log',
     'PluggableAuth'              => '/log/mediawiki/PluggableAuth.log',
     'LDAP'                       => '/log/mediawiki/ldap.log',
     'MediaWiki\\Extension\\LDAPProvider\\Client' => '/log/mediawiki/LDAPClient.log'

);

