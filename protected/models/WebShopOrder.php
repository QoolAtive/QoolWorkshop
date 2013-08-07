<?php

/**
 * This is the model class for table "web_shop_order".
 *
 * The followings are the available columns in table 'web_shop_order':
 * @property integer $web_shop_order_id
 * @property integer $web_shop_id
 * @property integer $web_shop_item_id
 * @property string $customer_name
 * @property string $customer_tel
 * @property string $customer_email
 * @property integer $amount
 * @property integer $price_all
 * @property string $order_at
 * @property integer $status
 */
class WebShopOrder extends WebShopOrderBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WebShopOrderBase the static model class
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
		return 'web_shop_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('web_shop_order_id, web_shop_id, web_shop_item_id, customer_name, customer_tel, customer_email, amount, price_all, order_at', 'required'),
			array('web_shop_order_id, web_shop_id, web_shop_item_id, amount, price_all, status', 'numerical', 'integerOnly'=>true),
			array('customer_name, customer_tel, customer_email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('web_shop_order_id, web_shop_id, web_shop_item_id, customer_name, customer_tel, customer_email, amount, price_all, order_at, status', 'safe', 'on'=>'search'),
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
			'web_shop_order_id' => 'Web Shop Order',
			'web_shop_id' => 'Web Shop',
			'web_shop_item_id' => 'Web Shop Item',
			'customer_name' => 'Customer Name',
			'customer_tel' => 'Customer Tel',
			'customer_email' => 'Customer Email',
			'amount' => 'Amount',
			'price_all' => 'Price All',
			'order_at' => 'Order At',
			'status' => 'Status',
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

		$criteria->compare('web_shop_order_id',$this->web_shop_order_id);
		$criteria->compare('web_shop_id',$this->web_shop_id);
		$criteria->compare('web_shop_item_id',$this->web_shop_item_id);
		$criteria->compare('customer_name',$this->customer_name,true);
		$criteria->compare('customer_tel',$this->customer_tel,true);
		$criteria->compare('customer_email',$this->customer_email,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('price_all',$this->price_all);
		$criteria->compare('order_at',$this->order_at,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}