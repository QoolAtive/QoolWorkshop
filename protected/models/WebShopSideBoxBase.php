<?php

/**
 * This is the model class for table "web_shop_side_box".
 *
 * The followings are the available columns in table 'web_shop_side_box':
 * @property integer $web_shop_id
 * @property integer $calendar
 * @property integer $forecast
 * @property integer $exchange
 * @property integer $lottery
 * @property integer $oil
 * @property integer $gold
 * @property integer $stock
 *
 * The followings are the available model relations:
 * @property WebShop $webShop
 */
class WebShopSideBoxBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WebShopSideBoxBase the static model class
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
		return 'web_shop_side_box';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('web_shop_id', 'required'),
			array('web_shop_id, calendar, forecast, exchange, lottery, oil, gold, stock', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('web_shop_id, calendar, forecast, exchange, lottery, oil, gold, stock', 'safe', 'on'=>'search'),
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
			'web_shop_id' => 'Web Shop',
			'calendar' => 'Calendar',
			'forecast' => 'Forecast',
			'exchange' => 'Exchange',
			'lottery' => 'Lottery',
			'oil' => 'Oil',
			'gold' => 'Gold',
			'stock' => 'Stock',
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

		$criteria->compare('web_shop_id',$this->web_shop_id);
		$criteria->compare('calendar',$this->calendar);
		$criteria->compare('forecast',$this->forecast);
		$criteria->compare('exchange',$this->exchange);
		$criteria->compare('lottery',$this->lottery);
		$criteria->compare('oil',$this->oil);
		$criteria->compare('gold',$this->gold);
		$criteria->compare('stock',$this->stock);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}