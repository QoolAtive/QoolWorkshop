<?php

/**
 * This is the model class for table "deliv_ser".
 *
 * The followings are the available columns in table 'deliv_ser':
 * @property integer $deliv_ser_id
 * @property integer $com_id
 * @property integer $delivery_id
 * @property string $other
 */
class DelivSerBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DelivSerBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'deliv_ser';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_id, delivery_id', 'required'),
			array('com_id, delivery_id', 'numerical', 'integerOnly'=>true),
			array('other', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('deliv_ser_id, com_id, delivery_id, other', 'safe', 'on'=>'search'),
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
			'deliv_ser_id' => 'Deliv Ser',
			'com_id' => 'Com',
			'delivery_id' => 'Delivery',
			'other' => 'Other',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('deliv_ser_id',$this->deliv_ser_id);
		$criteria->compare('com_id',$this->com_id);
		$criteria->compare('delivery_id',$this->delivery_id);
		$criteria->compare('other',$this->other,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}