<?php

/**
 * This is the model class for table "web_shop_format".
 *
 * The followings are the available columns in table 'web_shop_format':
 * @property integer $web_shop_format_id
 * @property integer $web_shop_id
 * @property string $logo
 * @property string $theme
 * @property string $background
 *
 * The followings are the available model relations:
 * @property WebShop $webShop
 */
class WebShopFormatBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WebShopFormatBase the static model class
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
		return 'web_shop_format';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('web_shop_id, theme', 'required'),
			array('web_shop_id', 'numerical', 'integerOnly'=>true),
			array('logo, theme, background', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('web_shop_format_id, web_shop_id, logo, theme, background', 'safe', 'on'=>'search'),
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
			'web_shop_format_id' => 'Web Shop Format',
			'web_shop_id' => 'Web Shop',
			'logo' => 'Logo',
			'theme' => 'Theme',
			'background' => 'Background',
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

		$criteria->compare('web_shop_format_id',$this->web_shop_format_id);
		$criteria->compare('web_shop_id',$this->web_shop_id);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('theme',$this->theme,true);
		$criteria->compare('background',$this->background,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}