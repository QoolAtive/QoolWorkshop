<?php

/**
 * This is the model class for table "sp_type_business_sub".
 *
 * The followings are the available columns in table 'sp_type_business_sub':
 * @property integer $sp_type_business_sub_id
 * @property integer $sp_type_business
 * @property string $name_th
 * @property string $name_en
 * @property string $about_th
 * @property string $about_en
 */
class SpTypeBusinessSubBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpTypeBusinessSubBase the static model class
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
		return 'sp_type_business_sub';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sp_type_business, name_th', 'required'),
			array('sp_type_business', 'numerical', 'integerOnly'=>true),
			array('name_th, name_en', 'length', 'max'=>255),
			array('about_th, about_en', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sp_type_business_sub_id, sp_type_business, name_th, name_en, about_th, about_en', 'safe', 'on'=>'search'),
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
			'sp_type_business_sub_id' => 'Sp Type Business Sub',
			'sp_type_business' => 'Sp Type Business',
			'name_th' => 'Name Th',
			'name_en' => 'Name En',
			'about_th' => 'About Th',
			'about_en' => 'About En',
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

		$criteria->compare('sp_type_business_sub_id',$this->sp_type_business_sub_id);
		$criteria->compare('sp_type_business',$this->sp_type_business);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('about_th',$this->about_th,true);
		$criteria->compare('about_en',$this->about_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}