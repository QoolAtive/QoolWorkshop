<?php

/**
 * This is the model class for table "sp_product".
 *
 * The followings are the available columns in table 'sp_product':
 * @property integer $id
 * @property string $image
 * @property integer $main_id
 * @property string $name
 * @property string $name_en
 * @property string $detail
 * @property string $detail_en
 * @property string $guide
 * @property string $date_write
 */
class SpProductBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpProductBase the static model class
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
		return 'sp_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_id, name, name_en, detail, detail_en, guide, date_write', 'required'),
			array('main_id', 'numerical', 'integerOnly'=>true),
			array('image, name, name_en', 'length', 'max'=>255),
			array('guide', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, main_id, name, name_en, detail, detail_en, guide, date_write', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'image' => 'Image',
			'main_id' => 'Main',
			'name' => 'Name',
			'name_en' => 'Name En',
			'detail' => 'Detail',
			'detail_en' => 'Detail En',
			'guide' => 'Guide',
			'date_write' => 'Date Write',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('main_id',$this->main_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('detail_en',$this->detail_en,true);
		$criteria->compare('guide',$this->guide,true);
		$criteria->compare('date_write',$this->date_write,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}