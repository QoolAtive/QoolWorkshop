<?php

/**
 * This is the model class for table "sp_company".
 *
 * The followings are the available columns in table 'sp_company':
 * @property integer $id
 * @property string $logo
 * @property string $name
 * @property string $name_en
 * @property string $infor
 * @property string $infor_en
 * @property integer $type_business
 * @property string $address
 * @property string $address_en
 * @property string $contact_name
 * @property string $contact_name_en
 * @property string $contact_tel
 * @property string $contact_email
 * @property string $facebook
 * @property string $twitter
 * @property string $website
 * @property string $banner
 * @property string $brochure
 * @property string $partner
 */
class SpCompanyBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpCompanyBase the static model class
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
		return 'sp_company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('logo, name, name_en, infor, infor_en, address, address_en, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, website, banner, brochure, partner', 'required'),
			array('type_business', 'numerical', 'integerOnly'=>true),
			array('logo, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, twitter, banner, brochure', 'length', 'max'=>100),
			array('name, name_en, address, address_en, facebook, website', 'length', 'max'=>255),
			array('partner', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, logo, name, name_en, infor, infor_en, type_business, address, address_en, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, facebook, twitter, website, banner, brochure, partner', 'safe', 'on'=>'search'),
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
			'logo' => 'Logo',
			'name' => 'Name',
			'name_en' => 'Name En',
			'infor' => 'Infor',
			'infor_en' => 'Infor En',
			'type_business' => 'Type Business',
			'address' => 'Address',
			'address_en' => 'Address En',
			'contact_name' => 'Contact Name',
			'contact_name_en' => 'Contact Name En',
			'contact_tel' => 'Contact Tel',
			'contact_email' => 'Contact Email',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'website' => 'Website',
			'banner' => 'Banner',
			'brochure' => 'Brochure',
			'partner' => 'Partner',
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
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('infor',$this->infor,true);
		$criteria->compare('infor_en',$this->infor_en,true);
		$criteria->compare('type_business',$this->type_business);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('address_en',$this->address_en,true);
		$criteria->compare('contact_name',$this->contact_name,true);
		$criteria->compare('contact_name_en',$this->contact_name_en,true);
		$criteria->compare('contact_tel',$this->contact_tel,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('banner',$this->banner,true);
		$criteria->compare('brochure',$this->brochure,true);
		$criteria->compare('partner',$this->partner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}