<?php

/**
 * This is the model class for table "company_brochure".
 *
 * The followings are the available columns in table 'company_brochure':
 * @property integer $company_brochure_id
 * @property integer $com_id
 * @property string $path
 */
class CompanyBrochureBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyBrochureBase the static model class
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
		return 'company_brochure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_id, path', 'required'),
			array('com_id', 'numerical', 'integerOnly'=>true),
			array('path', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('company_brochure_id, com_id, path', 'safe', 'on'=>'search'),
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
			'company_brochure_id' => 'Company Brochure',
			'com_id' => 'Com',
			'path' => 'Path',
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

		$criteria->compare('company_brochure_id',$this->company_brochure_id);
		$criteria->compare('com_id',$this->com_id);
		$criteria->compare('path',$this->path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}