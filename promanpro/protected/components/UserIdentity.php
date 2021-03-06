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
		//$users=array(
			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
		//);

		$pass = md5($this->password);
                $users=User::model()->findByAttributes(array('Username'=>  $this->username));
		if($users==null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users->Password !== $pass)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
                elseif($users->isActive==0)
			$this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
		else{
                        $this->setState('username', $users->Username);
                        $this->setState('id', $users->ID);
                $this->errorCode=self::ERROR_NONE;
                }
//        echo 'users '.$users->Password.'</br>';
//        echo 'this '.$pass.'</br>';
		return $this->errorCode;
	}
}