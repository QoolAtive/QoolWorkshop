<?php

/**
 * This is the model class for table "site_map_sub".
 *
 * The followings are the available columns in table 'site_map_sub':
 * @property integer $site_map_sub_id
 * @property integer $id_code
 * @property string $name
 * @property string $name_en
 * @property string $link
 * @property integer $main_id
 * @property integer $sub_id
 * @property integer $sort
 */
class SiteMapSubBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SiteMapSubBase the static model class
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
		return 'site_map_sub';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, link', 'required'),
			array('id_code, main_id, sub_id, sort', 'numerical', 'integerOnly'=>true),
			array('name, name_en, link', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('site_map_sub_id, id_code, name, name_en, link, main_id, sub_id, sort', 'safe', 'on'=>'search'),
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
			'site_map_sub_id' => 'Site Map Sub',
			'id_code' => 'Id Code',
			'name' => 'Name',
			'name_en' => 'Name En',
			'link' => 'Link',
			'main_id' => 'Main',
			'sub_id' => 'Sub',
			'sort' => 'Sort',
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

		$criteria->compare('site_map_sub_id',$this->site_map_sub_id);
		$criteria->compare('id_code',$this->id_code);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('main_id',$this->main_id);
		$criteria->compare('sub_id',$this->sub_id);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}