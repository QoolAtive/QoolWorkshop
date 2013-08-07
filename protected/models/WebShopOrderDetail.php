<?php

/**
 * This is the model class for table "web_shop_order_detail".
 *
 * The followings are the available columns in table 'web_shop_order_detail':
 * @property integer $web_shop_order_id
 * @property integer $web_shop_id
 * @property integer $web_shop_item_id
 * @property integer $amount
 *
 * The followings are the available model relations:
 * @property WebShop $webShop
 * @property WebShopItem $webShopItem
 * @property WebShopOrder $webShopOrder
 */
class WebShopOrderDetail extends WebShopOrderDetailBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WebShopOrderDetailBase the static model class
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
		return 'web_shop_order_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('web_shop_order_id, web_shop_id, web_shop_item_id, amount', 'required'),
			array('web_shop_order_id, web_shop_id, web_shop_item_id, amount', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('web_shop_order_id, web_shop_id, web_shop_item_id, amount', 'safe', 'on'=>'search'),
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
			'webShopItem' => array(self::BELONGS_TO, 'WebShopItem', 'web_shop_item_id'),
			'webShopOrder' => array(self::BELONGS_TO, 'WebShopOrder', 'web_shop_order_id'),
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
			'amount' => 'Amount',
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
		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}