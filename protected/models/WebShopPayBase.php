<?php

/**
 * This is the model class for table "web_shop_pay".
 *
 * The followings are the available columns in table 'web_shop_pay':
 * @property integer $web_shop_pay_id
 * @property integer $web_shop_id
 * @property integer $pay_transfer
 * @property string $account_bank
 * @property string $account_name
 * @property string $account_number
 * @property integer $pay_ems
 * @property integer $pay_byself
 * @property string $location
 * @property string $tel
 * @property integer $pay_other
 * @property string $other
 *
 * The followings are the available model relations:
 * @property WebShop $webShop
 */
class WebShopPayBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WebShopPayBase the static model class
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
		return 'web_shop_pay';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('web_shop_id, pay_transfer, pay_ems, pay_byself, pay_other', 'required'),
			array('web_shop_id, pay_transfer, pay_ems, pay_byself, pay_other', 'numerical', 'integerOnly'=>true),
			array('account_bank, account_name, account_number', 'length', 'max'=>100),
			array('tel', 'length', 'max'=>20),
			array('location, other', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('web_shop_pay_id, web_shop_id, pay_transfer, account_bank, account_name, account_number, pay_ems, pay_byself, location, tel, pay_other, other', 'safe', 'on'=>'search'),
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
			'webShop' => array(self::BELONGS_TO, 'WebShop', 'web_shop_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'web_shop_pay_id' => 'Web Shop Pay',
			'web_shop_id' => 'Web Shop',
			'pay_transfer' => 'Pay Transfer',
			'account_bank' => 'Account Bank',
			'account_name' => 'Account Name',
			'account_number' => 'Account Number',
			'pay_ems' => 'Pay Ems',
			'pay_byself' => 'Pay Byself',
			'location' => 'Location',
			'tel' => 'Tel',
			'pay_other' => 'Pay Other',
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

		$criteria->compare('web_shop_pay_id',$this->web_shop_pay_id);
		$criteria->compare('web_shop_id',$this->web_shop_id);
		$criteria->compare('pay_transfer',$this->pay_transfer);
		$criteria->compare('account_bank',$this->account_bank,true);
		$criteria->compare('account_name',$this->account_name,true);
		$criteria->compare('account_number',$this->account_number,true);
		$criteria->compare('pay_ems',$this->pay_ems);
		$criteria->compare('pay_byself',$this->pay_byself);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('pay_other',$this->pay_other);
		$criteria->compare('other',$this->other,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}