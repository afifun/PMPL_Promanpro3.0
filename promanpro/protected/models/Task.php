<?php

/**
 * This is the model class for table "task".
 *
 * The followings are the available columns in table 'task':
 * @property integer $ID
 * @property string $Name
 * @property string $Description
 * @property string $PJ
 * @property integer $Progress
 * @property string $Start_Time
 * @property string $End_Time
 */
class Task extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'task';
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
						'Start_Time,End_Time',
						'match',
						'not' => true,
						'pattern' => '/[^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])]/' 
				),
				array (
						'Name, Start_Time, End_Time',
						'required' 
				),
				array (
						'Progress',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'Name, PJ',
						'length',
						'max' => 20 
				),
				array (
						'Description',
						'safe' 
				),
				array (
						'End_Time',
						'cekWaktu' 
				),
				array (
						'Progress',
						'cekProgress'
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'ID, Name, Description, PJ, Progress, Start_Time, End_Time',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	public function cekWaktu() {
		if ($this->Start_Time > $this->End_Time) {
			$this->addError ( 'End_Time', 'The Start Date cannot be older than End Date' );
		}
	}
	
	public function cekProgress() {
		if ($this->Progress > 100 || $this->Progress < 0) {
			$this->addError ( 'Progress', 'The Progress must be in range 0 - 100' );
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
				'PJ' => 'Assigned to',
				'Progress' => 'Progress',
				'Start_Time' => 'Start Time',
				'End_Time' => 'End Time' 
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
		$criteria->compare ( 'PJ', $this->PJ, true );
		$criteria->compare ( 'Progress', $this->Progress );
		$criteria->compare ( 'Start_Time', $this->Start_Time, true );
		$criteria->compare ( 'End_Time', $this->End_Time, true );
		
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
	 * @return Task the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
