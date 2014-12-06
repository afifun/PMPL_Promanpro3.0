<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $ID
 * @property string $Username
 * @property string $Password
 * @property string $Name
 * @property string $Email
 */
class User extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	
	// holds the password confirmation word
	public $Repassword;
	
	// will hold the encrypted password for update actions.
	public $initialPassword;
	public $old_password;
	public $new_password;
	public function tableName() {
		return 'user';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'ID,Username,Email',
						'unique' 
				),
				array (
						'Name',
						'match',
						'not' => true,
						'pattern' => '/[^a-zA-Z]/' 
				),
				array (
						'Password',
						'match',
						'not' => true,
						'pattern' => '/[^a-z0-9A-Z]/' 
				),
				array (
						'Username',
						'match',
						'not' => true,
						'pattern' => '/[^a-z0-9A-Z]/' 
				),
				array (
						'Email',
						'email' 
				),
				// array('Username,Password','min'=>8),
				// array('Username, Password, Repassword, Name, Email', 'required'),
				array (
						'Username, Name, Email',
						'required' 
				),
				array (
						'Username, Password, Repassword, Name, Email',
						'required',
						'on' => 'register' 
				),
				array (
						'Password',
						'compare',
						'compareAttribute' => 'Repassword',
						'on' => 'register' 
				),
				array (
						'Username, Password, Name',
						'length',
						'max' => 20,
						'on' => 'register' 
				),
				array (
						'old_password, new_password, Repassword',
						'required',
						'on' => 'changePwd' 
				),
				array (
						'old_password',
						'findPasswords',
						'on' => 'changePwd' 
				),
				array (
						'new_password',
						'compare',
						'compareAttribute' => 'Repassword',
						'on' => 'changePwd' 
				),
				array (
						'Password',
						'length',
						'min' => 8
				),
				array (
						'Email',
						'length',
						'max' => 30 
				),
				array (
						'Name',
						'length',
						'max' => 50
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'ID, Username, Password, Name, Email, isActive',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array ();
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'ID' => 'ID',
				'Username' => 'Username',
				'Password' => 'Password',
				'Repassword' => 'Retype Password',
				'old_password' => 'Old Password',
				'new_password' => 'New Password',
				'Name' => 'Name',
				'Email' => 'Email',
				'isActive' => 'isActive' 
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'ID', $this->ID );
		$criteria->compare ( 'Username', $this->Username, true );
		$criteria->compare ( 'Password', $this->Password, true );
		$criteria->compare ( 'Name', $this->Name, true );
		$criteria->compare ( 'Email', $this->Email, true );
		$criteria->compare ( 'isActive', $this->isActive, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	public function beforeSave() {
		$pass = md5 ( $this->Password );
		$this->Password = $pass;
		return true;
	}
	public function findPasswords($attribute, $params) {
		$user = User::model ()->findByPk ( Yii::app ()->user->id );
		echo 'user' . $user->Password . '</br>';
		echo 'old ' . md5 ( $this->old_password ) . '</br>';
		echo 'ID ' . $user->ID;
		if ($user->Password != md5 ( $this->old_password ))
			$this->addError ( $attribute, 'Old password is incorrect.' );
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * 
	 * @param string $className
	 *        	active record class name.
	 * @return User the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
