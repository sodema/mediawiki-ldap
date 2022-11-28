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
     'PluggableAuth'              => '/log/mediawiki/PluggableAuth.log',
     'LDAP'                       => '/log/mediawiki/ldap.log',
     'MediaWiki\\Extension\\LDAPProvider\\Client' => '/log/mediawiki/LDAPClient.log'

);



wfLoadExtensions( [
	'LDAPAuthentication2',
	'LDAPAuthorization',
	'LDAPGroups',
	'LDAPProvider',
	'LDAPUserInfo',
	'PluggableAuth'
] );

$wgAuthRemoteuserDomain = "LDAP_DOMAINNAME";
$wgAuthRemoteuserMailDomain =  "LDAP_SERVER_NAME";
$wgAuthRemoteuserNotify = true;

#LDAPAuthorization
$wgLdapAuthDomainNames = "LDAP_DOMAINNAME";
$wgLdapAuthIsActiveDirectory  = 'false';
$wgLdapAuthSearchTree         =  true ;


#PluggableAuth
$wgPluggableAuth_EnableAutoLogin  = false ;
$wgPluggableAuth_EnableLocalProperties = false ;
$wgPluggableAuth_EnableLocalLogin = false ;
$wgPluggableAuth_ButtonLabel = "LDAP Log In"; # defaults to "Login with PluggableAuth "


#LDAPAuthentication2
$LDAPAuthenticationAllowLocalLogin = true;
$LDAPAuthenticationUsernameNormalizer = 'strtolower';

$LDAPProviderDomainConfigProvider = function() {
	$config = [
		"LDAP_DOMAINNAME" => [
			"connection" => [
				"server" => "LDAP_SERVER_NAME",
				"port" => "LDAP_SERVER_PORT",
                                "enctype" => "LDAP_ENCTYPE",
				"user" => LDAP_BIND_USER,
				"pass" => LDAP_BIND_PASS,
				"basedn" => "LDAP_BASE",
				"userbasedn" => "LDAP_BASE",
				"groupbasedn" => "LDAP_BASE",
				"searchattribute" => "LDAP_USER_ATTR",
				"usernameattribute" => "LDAP_USER_ATTR",
				"realnameattribute" => "displayname",
				"emailattribute" => "mail",
				"grouprequest" => "MediaWiki\\Extension\\LDAPProvider\\UserGroupsRequest\\UserMemberOf::factory",
				"nestedgroups" => true
			],
			"authorization" => [
                                "rules" => [
                                        "attributes" => []
                                ]
			],
			"userinfo" => [
				"attributes-map" => [
					"email" => "mail",
					"realname" => "displayname"
				]
			],
			"groupsync" => [
				"mechanism" => "allgroups"
			]
		]
	];
	return new \MediaWiki\Extension\LDAPProvider\DomainConfigProvider\InlinePHPArray( $config );
};

$LDAPProviderCacheTime = 5;
$LDAPProviderCacheType            = "CACHE_NONE" ;
$LDAPProviderDefaultDomain        = "LDAP_DOMAINNAME" ;


# Group Permissions

$wgGroupPermissions['*']['edit'] = false;

$wgGroupPermissions['*']['createaccount'] = true;
$wgGroupPermissions['*']['autocreateaccount'] = true;

$wgGroupPermissions['wiki-admins']['delete'] = true;
$wgGroupPermissions['wiki-admins']['undelete'] = true;
$wgGroupPermissions['wiki-admins']['undelete'] = true;
$wgGroupPermissions['wiki-admins']['editprotected'] = true;
$wgGroupPermissions['wiki-admins']['protect'] = true;




## Visual Editor Stuff

wfLoadExtension( 'VisualEditor' );
wfLoadExtension( 'WikiEditor' );


