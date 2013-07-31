<?php

/**
 * This is the model class for table "mem_registration".
 *
 * The followings are the available columns in table 'mem_registration':
 * @property integer $id
 * @property integer $user_id
 * @property string $corporation_registration
 * @property string $commerce_registration
 * @property integer $type_business
 * @property string $product_name
 * @property string $product_name_en
 * @property string $trade_name
 * @property string $trade_name_en
 * @property string $business_name
 * @property string $business_name_en
 * @property integer $tname
 * @property string $ftname
 * @property string $ltname
 * @property integer $etname
 * @property string $fename
 * @property string $lename
 * @property integer $sex
 * @property string $birth
 * @property string $email
 * @property string $address
 * @property integer $province
 * @property integer $prefecture
 * @property integer $district
 * @property string $postcode
 * @property string $tel
 * @property string $mobile
 * @property string $fax
 * @property integer $high_education
 * @property integer $career
 * @property integer $skill_com
 * @property string $receive_news
 */
class MemRegistrationBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemRegistrationBase the static model class
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
		return 'mem_registration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, corporation_registration, commerce_registration, type_business, product_name, trade_name, business_name, tname, ftname, ltname, fename, sex, birth, email, address, province, prefecture, district, postcode, high_education, career, skill_com, receive_news', 'required'),
			array('user_id, type_business, tname, etname, sex, province, prefecture, district, high_education, career, skill_com', 'numerical', 'integerOnly'=>true),
			array('corporation_registration', 'length', 'max'=>13),
			array('commerce_registration', 'length', 'max'=>45),
			array('product_name, product_name_en, trade_name, trade_name_en, business_name, business_name_en, address', 'length', 'max'=>255),
			array('ftname, ltname, fename, lename, email, tel, mobile, fax', 'length', 'max'=>100),
			array('birth', 'length', 'max'=>4),
			array('postcode', 'length', 'max'=>5),
			array('receive_news', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, corporation_registration, commerce_registration, type_business, product_name, product_name_en, trade_name, trade_name_en, business_name, business_name_en, tname, ftname, ltname, etname, fename, lename, sex, birth, email, address, province, prefecture, district, postcode, tel, mobile, fax, high_education, career, skill_com, receive_news', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'corporation_registration' => 'Corporation Registration',
			'commerce_registration' => 'Commerce Registration',
			'type_business' => 'Type Business',
			'product_name' => 'Product Name',
			'product_name_en' => 'Product Name En',
			'trade_name' => 'Trade Name',
			'trade_name_en' => 'Trade Name En',
			'business_name' => 'Business Name',
			'business_name_en' => 'Business Name En',
			'tname' => 'Tname',
			'ftname' => 'Ftname',
			'ltname' => 'Ltname',
			'etname' => 'Etname',
			'fename' => 'Fename',
			'lename' => 'Lename',
			'sex' => 'Sex',
			'birth' => 'Birth',
			'email' => 'Email',
			'address' => 'Address',
			'province' => 'Province',
			'prefecture' => 'Prefecture',
			'district' => 'District',
			'postcode' => 'Postcode',
			'tel' => 'Tel',
			'mobile' => 'Mobile',
			'fax' => 'Fax',
			'high_education' => 'High Education',
			'career' => 'Career',
			'skill_com' => 'Skill Com',
			'receive_news' => 'Receive News',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('corporation_registration',$this->corporation_registration,true);
		$criteria->compare('commerce_registration',$this->commerce_registration,true);
		$criteria->compare('type_business',$this->type_business);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_name_en',$this->product_name_en,true);
		$criteria->compare('trade_name',$this->trade_name,true);
		$criteria->compare('trade_name_en',$this->trade_name_en,true);
		$criteria->compare('business_name',$this->business_name,true);
		$criteria->compare('business_name_en',$this->business_name_en,true);
		$criteria->compare('tname',$this->tname);
		$criteria->compare('ftname',$this->ftname,true);
		$criteria->compare('ltname',$this->ltname,true);
		$criteria->compare('etname',$this->etname);
		$criteria->compare('fename',$this->fename,true);
		$criteria->compare('lename',$this->lename,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('province',$this->province);
		$criteria->compare('prefecture',$this->prefecture);
		$criteria->compare('district',$this->district);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('high_education',$this->high_education);
		$criteria->compare('career',$this->career);
		$criteria->compare('skill_com',$this->skill_com);
		$criteria->compare('receive_news',$this->receive_news,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}