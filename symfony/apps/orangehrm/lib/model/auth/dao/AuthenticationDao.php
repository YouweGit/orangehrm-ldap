<?php

class AuthenticationDao extends BaseDao {

    /**
     *
     * @param string $username
     * @param string $password
     * @param string $method
     * @return Users 
     */
    public function getCredentials($username, $password,$method='internal') {

        if ($method == "ldap") {
	    require_once(ROOT_PATH . 'lib/common/ldap/adLDAP.php');
            $ldap = new adLDAP();

            // Authenticate using adLDAP configuratoin
            $authLdap = $ldap->authenticate($username,$password);

            if ($authLdap) {
		// Get the internally created user account (ESS/Admin accounts listed under users)
                $query = Doctrine_Query::create()
                        ->from('SystemUser')
                        ->where('user_name = ?', $username)
                        ->andWhere('deleted = 0');
            } else
	    {
		// Return an empty result set if authentication is false
                $query = Doctrine_Query::create()
                        ->from('SystemUser')
                        ->where('1 = 2');
	    }

        } else {
            $query = Doctrine_Query::create()
                    ->from('SystemUser')
                    ->where('user_name = ?', $username)
                    ->andWhere('user_password = ?', $password)
                    ->andWhere('deleted = 0');
        }

        return $query->fetchOne();
    }

}

