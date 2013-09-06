<?php

/**
 * This is the model class for table "company_sub_type_business".
 *
 * The followings are the available columns in table 'company_sub_type_business':
 * @property integer $company_sub_type_business_id
 * @property integer $company_type_business_id
 * @property string $name_th
 * @property string $name_en
 */
class CompanySubTypeBusinessBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanySubTypeBusinessBase the static model class
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
		return 'company_sub_type_business';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_type_business_id, name_th, name_en', 'required'),
			array('company_type_business_id', 'numerical', 'integerOnly'=>true),
			array('name_th, name_en', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('company_sub_type_business_id, company_type_business_id, name_th, name_en', 'safe', 'on'=>'search'),
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
			'company_sub_type_business_id' => 'Company Sub Type Business',
			'company_type_business_id' => 'Company Type Business',
			'name_th' => 'Name Th',
			'name_en' => 'Name En',
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

		$criteria->compare('company_sub_type_business_id',$this->company_sub_type_business_id);
		$criteria->compare('company_type_business_id',$this->company_type_business_id);
		$criteria->compare('name_th',$this->name_th,true);
		$criteria->compare('name_en',$this->name_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}