<?php

/**
 * This is the model class for table "company_license".
 *
 * The followings are the available columns in table 'company_license':
 * @property integer $company_license_id
 * @property integer $company_id
 * @property string $license_th
 * @property string $license_en
 * @property string $license_number
 *
 * The followings are the available model relations:
 * @property Company $company
 */
class CompanyLicense extends CompanyLicenseBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyLicenseBase the static model class
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
		return 'company_license';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id', 'required'),
			array('company_id', 'numerical', 'integerOnly'=>true),
			array('license_th, license_en, license_number', 'length', 'max'=>100),
			array('license_th, license_en, license_number', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('company_license_id, company_id, license_th, license_en, license_number', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'company_license_id' => 'Company License',
			'company_id' => 'Company',
			'license_th' => Yii::t('language', 'ชื่อใบอนุญาตภาษาไทย'),
			'license_en' => Yii::t('language', 'ชื่อใบอนุญาตภาษาอังกฤษ'),
			'license_number' => Yii::t('language', 'เลขที่ใบอนุญาต'),
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

		$criteria->compare('company_license_id',$this->company_license_id);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('license_th',$this->license_th,true);
		$criteria->compare('license_en',$this->license_en,true);
		$criteria->compare('license_number',$this->license_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}