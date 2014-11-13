<?php

/**
 * This is the model class for table "blockmeetup".
 *
 * The followings are the available columns in table 'blockmeetup':
 * @property integer $IdBlock
 * @property integer $IdMeetUp
 * @property integer $KoorX
 * @property integer $KoorY
 * @property string $Pemesan
 */
class Blockmeetup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'blockmeetup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdMeetUp, KoorX, KoorY, Pemesan', 'required'),
			array('IdMeetUp, KoorX, KoorY', 'numerical', 'integerOnly'=>true),
			array('Pemesan', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdBlock, IdMeetUp, KoorX, KoorY, Pemesan', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdBlock' => 'Id Block',
			'IdMeetUp' => 'Id Meet Up',
			'KoorX' => 'Koor X',
			'KoorY' => 'Koor Y',
			'Pemesan' => 'Pemesan',
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

		$criteria->compare('IdBlock',$this->IdBlock);
		$criteria->compare('IdMeetUp',$this->IdMeetUp);
		$criteria->compare('KoorX',$this->KoorX);
		$criteria->compare('KoorY',$this->KoorY);
		$criteria->compare('Pemesan',$this->Pemesan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Blockmeetup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
