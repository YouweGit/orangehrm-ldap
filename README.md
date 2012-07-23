orangehrm-ldap
==============

Ldap authentication support for OrangeHRM 2.7

Licensed under GPL 2.

This is a modification to the OrangeHRM 2.7 code to support ldap / Active Directory logins for users.

This modification will first try to authenticate on the OrangeHRM database, then fall back to ldap/AD if unsuccessful.
Users who you want to have access to orangehrm with ldap/AD authentication should be added in with the same username as used on ldap/AD with the password "ldap".
Users with a password of "ldap" will not authenticate via the OrangeHRM database.

SETUP

1) Create user accounts in OrangeHRM for the ldap/ad users, this can either be admin or ESS accounts.

2) Edit the lib/common/ldap/adLDAP.php file and setup your ldap/AD details.

3) Copy the files over your OrangeHRM 2.7 installation.

More information on configuring the adLDAP class, can be found here:

http://adldap.sourceforge.net/wiki/doku.php?id=documentation_configuration


TODO

1) Create a script to test/debug adLDAP configuration.
