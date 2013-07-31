<?php

/**
 * This is the model class for table "mem_person".
 *
 * The followings are the available columns in table 'mem_person':
 * @property integer $id
 * @property integer $user_id
 * @property integer $mem_type
 * @property integer $business_type
 * @property string $product_name
 * @property string $product_name_en
 * @property string $panit
 * @property integer $sex
 * @property integer $tname
 * @property string $ftname
 * @property string $ltname
 * @property integer $etname
 * @property string $fename
 * @property string $lename
 * @property string $birth
 * @property string $email
 * @property string $facebook
 * @property string $twitter
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
class MemPersonBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemPersonBase the static model class
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
		return 'mem_person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, mem_type, business_type, sex, tname, ftname, ltname, birth, email, facebook, twitter, address, province, prefecture, district, postcode, high_education, career, skill_com, receive_news', 'required'),
			array('user_id, mem_type, business_type, sex, tname, etname, province, prefecture, district, high_education, career, skill_com', 'numerical', 'integerOnly'=>true),
			array('product_name, product_name_en, panit, ftname, ltname, fename, lename, email, twitter, tel, mobile, fax', 'length', 'max'=>100),
			array('birth', 'length', 'max'=>4),
			array('facebook, address', 'length', 'max'=>255),
			array('postcode', 'length', 'max'=>5),
			array('receive_news', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, mem_type, business_type, product_name, product_name_en, panit, sex, tname, ftname, ltname, etname, fename, lename, birth, email, facebook, twitter, address, province, prefecture, district, postcode, tel, mobile, fax, high_education, career, skill_com, receive_news', 'safe', 'on'=>'search'),
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
			'mem_type' => 'Mem Type',
			'business_type' => 'Business Type',
			'product_name' => 'Product Name',
			'product_name_en' => 'Product Name En',
			'panit' => 'Panit',
			'sex' => 'Sex',
			'tname' => 'Tname',
			'ftname' => 'Ftname',
			'ltname' => 'Ltname',
			'etname' => 'Etname',
			'fename' => 'Fename',
			'lename' => 'Lename',
			'birth' => 'Birth',
			'email' => 'Email',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
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
		$criteria->compare('mem_type',$this->mem_type);
		$criteria->compare('business_type',$this->business_type);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_name_en',$this->product_name_en,true);
		$criteria->compare('panit',$this->panit,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('tname',$this->tname);
		$criteria->compare('ftname',$this->ftname,true);
		$criteria->compare('ltname',$this->ltname,true);
		$criteria->compare('etname',$this->etname);
		$criteria->compare('fename',$this->fename,true);
		$criteria->compare('lename',$this->lename,true);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
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