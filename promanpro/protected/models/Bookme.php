<?php

/**
 * This is the model class for table "bookme".
 *
 * The followings are the available columns in table 'bookme':
 * @property integer $IdBookMe
 * @property integer $IdProject
 * @property string $StartDate
 * @property string $EndDate
 * @property string $StartTime
 * @property string $EndTime
 * @property string $Name
 * @property string $Description
 */
class Bookme extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bookme';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdProject, StartDate, EndDate, StartTime, EndTime, Name', 'required'),
			array('IdProject', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>40),
			array('Description', 'length', 'max'=>300),
                    array('EndTime','cekWaktu'),
                    array('EndDate','cekTanggal'),
                    array('StartDate','cekWaktu2'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdBookMe, IdProject, StartDate, EndDate, StartTime, EndTime, Name, Description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

        public function cekTanggal(){
            if($this->StartDate > $this->EndDate){
                $this->addError('EndDate', 'The Start Date cannot be older than End Date') ;
            }
        }
        
        public function cekWaktu(){
            if($this->StartTime > $this->EndTime){
                $this->addError('EndTime', 'The Start Time cannot be older than End Time') ;
            }
        }
        
        public function cekWaktu2(){
            $tanggal = date("Y-m-d");
            $jam = date("H:i");
            if($this->StartDate <$tanggal){
                $this->addError('StartDate', 'The Start Date has passed') ;
            }
        }
        
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdBookMe' => 'Id Book Me',
			'IdProject' => 'Id Project',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'StartTime' => 'Start Time',
			'EndTime' => 'End Time',
			'Name' => 'Name',
			'Description' => 'Description',
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
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IdBookMe',$this->IdBookMe);
		$criteria->compare('IdProject',$this->IdProject);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('StartTime',$this->StartTime,true);
		$criteria->compare('EndTime',$this->EndTime,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Description',$this->Description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bookme the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
