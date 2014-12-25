<?php

/**
 * This is the model class for table "blockjam".
 *
 * The followings are the available columns in table 'blockjam':
 * @property integer $idBlock
 * @property integer $idBookMe
 * @property integer $KoorX
 * @property integer $KoorY
 * @property string $Status
 * @property string $Pemesan
 */
class Blockjam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'blockjam';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idBookMe, KoorX, KoorY, Status, Pemesan', 'required'),
			array('idBookMe, KoorX, KoorY', 'numerical', 'integerOnly'=>true),
			array('Status', 'length', 'max'=>20),
			array('Pemesan', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idBlock, idBookMe, KoorX, KoorY, Status, Pemesan', 'safe', 'on'=>'search'),
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
			'idBlock' => 'Id Block',
			'idBookMe' => 'Id Book Me',
			'KoorX' => 'Koor X',
			'KoorY' => 'Koor Y',
			'Status' => 'Status',
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

		$criteria->compare('idBlock',$this->idBlock);
		$criteria->compare('idBookMe',$this->idBookMe);
		$criteria->compare('KoorX',$this->KoorX);
		$criteria->compare('KoorY',$this->KoorY);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Pemesan',$this->Pemesan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Blockjam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
