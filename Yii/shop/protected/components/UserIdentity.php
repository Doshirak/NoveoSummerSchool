<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
        $user = User::model()->findByAttributes(array('username'=>$this->username));

//        var_dump(CPasswordHelper::verifyPassword($this->password,$user->password));
//        var_dump($user);

        if(!isset($user)) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
//        elseif(CPasswordHelper::verifyPassword($this->password,$user->password) === false) {
//            $this->errorCode=self::ERROR_PASSWORD_INVALID;
//        }
        elseif($this->password != $user->password) {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else {
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
}