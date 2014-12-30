<?php

/**
 * This is the model class for table "meetup".
 *
 * The followings are the available columns in table 'meetup':
 * @property integer $IdMeetup
 * @property integer $IdProject
 * @property string $Name
 * @property string $Description
 * @property string $StartDay
 * @property string $EndDay
 * @property string $StartTime
 * @property string $EndTime
 */
class Meetup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'meetup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdProject, Name, StartDay, EndDay, StartTime, EndTime', 'required'),
			array('IdProject', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>30),
			array (
						'Name',
						'match',
						'pattern' => '/^[a-zA-Z]+[a-zA-Z ]$/' 
				),
			array('Description', 'length', 'max'=>140),
                    array('EndTime','cekWaktu'),
                    array('EndDay','cekTanggal'),
                    array('StartDay','cekWaktu2'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdMeetup, IdProject, Name, Description, StartDay, EndDay, StartTime, EndTime', 'safe', 'on'=>'search'),
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
            if($this->StartDay > $this->EndDay){
                $this->addError('EndDay', 'The Start Day cannot be older than End Day') ;
            }
        }
        
        public function cekWaktu(){
            if($this->StartTime > $this->EndTime){
                $this->addError('EndTime', 'The Start Time cannot be older than End Time') ;
            }
        }
        
        public function cekWaktu2(){
            $tanggal = date("Y-m-d");
            //$jam = date("H:i");
            if($this->StartDay <$tanggal){
                $this->addError('StartDay', 'The Start Day has passed') ;
            }
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdMeetup' => 'Id Meetup',
			'IdProject' => 'Id Project',
			'Name' => 'Name',
			'Description' => 'Description',
			'StartDay' => 'Start Day',
			'EndDay' => 'End Day',
			'StartTime' => 'Start Time',
			'EndTime' => 'End Time',
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

		$criteria->compare('IdMeetup',$this->IdMeetup);
		$criteria->compare('IdProject',$this->IdProject);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('StartDay',$this->StartDay,true);
		$criteria->compare('EndDay',$this->EndDay,true);
		$criteria->compare('StartTime',$this->StartTime,true);
		$criteria->compare('EndTime',$this->EndTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Meetup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
