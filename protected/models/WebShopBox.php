<?php

/**
 * This is the model class for table "web_shop_box".
 *
 * The followings are the available columns in table 'web_shop_box':
 * @property integer $web_shop_box_id
 * @property integer $web_shop_id
 * @property string $name_th
 * @property string $name_en
 * @property integer $type
 * @property string $code
 * @property integer $order_n
 * @property integer $show_box
 *
 * The followings are the available model relations:
 * @property WebShop $webShop
 * @property WebShopBoxItem[] $webShopBoxItems
 */
class WebShopBox extends WebShopBoxBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WebShopBoxBase the static model class
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
		return 'web_shop_box';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('web_shop_id, name_th, name_en, type, order_n, show_box', 'required'),
			array('web_shop_id, type, order_n, show_box', 'numerical', 'integerOnly'=>true),
			array('name_th, name_en', 'length', 'max'=>100),
			array('code', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('web_shop_box_id, web_shop_id, name_th, name_en, type, code, order_n, show_box', 'safe', 'on'=>'search'),
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
			'webShopBoxItems' => array(self::HAS_MANY, 'WebShopBoxItem', 'web_shop_box_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'web_shop_box_id' => 'Web Shop Box',
			'web_shop_id' => 'Web Shop',
			'name_th' => 'ชื่อกล่องภาษาไทย',
			'name_en' => 'ชื่อกล่องภาษาอังกฤษ',
			'type' => 'Type',
			'code' => 'Code',
			'order_n' => 'Order N',
			'show_box' => 'Show',
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

		$criteria->compare('web_shop_box_id',$this->web_shop_box_id);
		$criteria->compare('web_shop_id',$this->web_shop_id);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('order_n',$this->order_n);
		$criteria->compare('show_box',$this->show_box);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}