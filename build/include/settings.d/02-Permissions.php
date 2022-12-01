<?php
# Group Permissions

# Disable manual account creation
$wgGroupPermissions['*']['edit'] = false;

$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['autocreateaccount'] = true;

# Disable reading by anonymous users
$wgGroupPermissions['*']['read'] = false;

# But allow them to read e.g., these pages:
$wgWhitelistRead = [ "F.A.Q.", "Help:Contents" ];


$wgGroupPermissions['wiki-admins']['delete'] = true;
$wgGroupPermissions['wiki-admins']['undelete'] = true;
$wgGroupPermissions['wiki-admins']['editprotected'] = true;
$wgGroupPermissions['wiki-admins']['protect'] = true;
$wgGroupPermissions['wiki-admins']['import'] = true;
$wgGroupPermissions['wiki-admins']['importupload'] = true;
$wgGroupPermissions['wiki-admins']['editinterface'] = true;
$wgGroupPermissions['wiki-admins']['rollback'] = true;
$wgGroupPermissions['wiki-admins']['browsearchive'] = true;
$wgGroupPermissions['wiki-admins']['undelete'] = true;

