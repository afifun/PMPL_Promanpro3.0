<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $ID
 * @property string $Name
 * @property string $Description
 * @property string $Status
 * @property string $Start_Date
 * @property string $End_Date
 * @property string $adminProject
 */
class Project extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'project';
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
						'Start_Date,End_Date',
						'match',
						'not' => true,
						'pattern' => '/[^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])]/' 
				),
				array (
						'Name,Start_Date',
						'required'
				),
				array (
						'Name',
						'match',
						'pattern' => '/^[a-zA-Z]+[a-zA-Z ]$/' 
				),
				array (
						'Name',
						'unique',

				),
				array (
						'Name',
						'length',
						'max' => 20 
				),
				array (
						'Status',
						'length',
						'max' => 10 
				),
				array (
						'adminProject',
						'length',
						'max' => 30 
				),
				array (
						'Description, End_Date',
						'safe' 
				),
				array (
						'End_Time',
						'cekWaktu'
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'ID, Name, Description, Status, Start_Date, End_Date, adminProject',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	public function cekWaktu() {
		if ($this->Start_Date > $this->End_Date) {
			$this->addError ( 'End_Date', 'The Start Date cannot be older than End Date' );
		}
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
				'Name' => 'Name',
				'Description' => 'Description',
				'Status' => 'Status',
				'Start_Date' => 'Start Date',
				'End_Date' => 'End Date',
				'adminProject' => 'Admin Project' 
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
		$criteria->compare ( 'Name', $this->Name, true );
		$criteria->compare ( 'Description', $this->Description, true );
		$criteria->compare ( 'Status', $this->Status, true );
		$criteria->compare ( 'Start_Date', $this->Start_Date, true );
		$criteria->compare ( 'End_Date', $this->End_Date, true );
		$criteria->compare ( 'adminProject', $this->adminProject, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * 
	 * @param string $className
	 *        	active record class name.
	 * @return Project the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
