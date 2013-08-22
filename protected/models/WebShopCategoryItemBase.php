<?php

/**
 * This is the model class for table "web_shop_category_item".
 *
 * The followings are the available columns in table 'web_shop_category_item':
 * @property integer $web_shop_category_item_id
 * @property integer $web_shop_id
 * @property integer $web_shop_category_id
 * @property integer $web_shop_item_id
 *
 * The followings are the available model relations:
 * @property WebShopItem $webShopItem
 * @property WebShop $webShop
 * @property WebShopCategory $webShopCategory
 */
class WebShopCategoryItemBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WebShopCategoryItemBase the static model class
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
		return 'web_shop_category_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('web_shop_category_item_id, web_shop_id, web_shop_category_id, web_shop_item_id', 'required'),
			array('web_shop_category_item_id, web_shop_id, web_shop_category_id, web_shop_item_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('web_shop_category_item_id, web_shop_id, web_shop_category_id, web_shop_item_id', 'safe', 'on'=>'search'),
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
			'webShopItem' => array(self::BELONGS_TO, 'WebShopItem', 'web_shop_item_id'),
			'webShop' => array(self::BELONGS_TO, 'WebShop', 'web_shop_id'),
			'webShopCategory' => array(self::BELONGS_TO, 'WebShopCategory', 'web_shop_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'web_shop_category_item_id' => 'Web Shop Category Item',
			'web_shop_id' => 'Web Shop',
			'web_shop_category_id' => 'Web Shop Category',
			'web_shop_item_id' => 'Web Shop Item',
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

		$criteria->compare('web_shop_category_item_id',$this->web_shop_category_item_id);
		$criteria->compare('web_shop_id',$this->web_shop_id);
		$criteria->compare('web_shop_category_id',$this->web_shop_category_id);
		$criteria->compare('web_shop_item_id',$this->web_shop_item_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}