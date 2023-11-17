<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
    {
        $user = Users::model()->findByAttributes(array('username' => $this->username));
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if (!CPasswordHelper::verifyPassword($this->password, $user->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $user->user_id;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;

            // Cari role pengguna dari tabel authassignment
            $assignment = Authassignment::model()->find('userid=:userid', array(':userid'=>$user->user_id));
            if ($assignment !== null) {
                // echo 'Role dari database: ' . $assignment->itemname;
                // exit;
                $this->setState('role', $assignment->itemname); // Menyimpan role pengguna ke session
            }
        }
        return $this->errorCode == self::ERROR_NONE;
    }


    
    public function getId()
    {
        return $this->_id;
    }
}