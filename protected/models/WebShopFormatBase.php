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
 * @property string $char_color
 * @property string $char_size
 * @property string $topic_color
 * @property string $topic_size
 * @property string $link_color
 * @property string $link_size
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
			array('char_color, topic_color, link_color', 'length', 'max'=>6),
			array('char_size, topic_size, link_size', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('web_shop_format_id, web_shop_id, logo, theme, background, char_color, char_size, topic_color, topic_size, link_color, link_size', 'safe', 'on'=>'search'),
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
			'char_color' => 'Char Color',
			'char_size' => 'Char Size',
			'topic_color' => 'Topic Color',
			'topic_size' => 'Topic Size',
			'link_color' => 'Link Color',
			'link_size' => 'Link Size',
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
		$criteria->compare('char_color',$this->char_color,true);
		$criteria->compare('char_size',$this->char_size,true);
		$criteria->compare('topic_color',$this->topic_color,true);
		$criteria->compare('topic_size',$this->topic_size,true);
		$criteria->compare('link_color',$this->link_color,true);
		$criteria->compare('link_size',$this->link_size,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}