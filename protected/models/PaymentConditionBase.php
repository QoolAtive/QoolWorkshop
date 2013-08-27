<?php

/**
 * This is the model class for table "payment_condition".
 *
 * The followings are the available columns in table 'payment_condition':
 * @property integer $payment_condition_id
 * @property integer $product_id
 * @property integer $payment_id
 * @property string $other
 * @property string $other_en
 */
class PaymentConditionBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaymentConditionBase the static model class
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
		return 'payment_condition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, payment_id', 'required'),
			array('product_id, payment_id', 'numerical', 'integerOnly'=>true),
			array('other, other_en', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('payment_condition_id, product_id, payment_id, other, other_en', 'safe', 'on'=>'search'),
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
			'payment_condition_id' => 'Payment Condition',
			'product_id' => 'Product',
			'payment_id' => 'Payment',
			'other' => 'Other',
			'other_en' => 'Other En',
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

		$criteria->compare('payment_condition_id',$this->payment_condition_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('payment_id',$this->payment_id);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('other_en',$this->other_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}