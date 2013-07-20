<?php

class MemRegistration extends MemRegistrationBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'mem_registration';
    }

    public function rules() {
        return array(
            array('etname, user_id, corporation_registration, commerce_registration, type_business, product_name, trade_name, business_name, tname, ftname, ltname, fename, lename, sex, birth, email, address, province, prefecture, district, postcode, tel, mobile, fax, high_education, career, skill_com, receive_news', 'required'),
            array('etname, user_id, type_business, tname, sex, province, prefecture, district, high_education, career, skill_com', 'numerical', 'integerOnly' => true),
            array('corporation_registration', 'length', 'max' => 13),
            array('commerce_registration', 'length', 'max' => 45),
            array('product_name_en, trade_name_en, business_name_en, product_name, trade_name, business_name, address', 'length', 'max' => 255),
            array('ftname, ltname, fename, lename, email, tel, mobile, fax', 'length', 'max' => 100),
            array('birth', 'length', 'max' => 4),
            array('postcode', 'length', 'max' => 5),
            array('receive_news', 'length', 'max' => 1),
            //ห้ามซ้ำ
            array('corporation_registration, commerce_registration', 'unique', 'message' => '{attribute}' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
            array('email', 'unique', 'message' => '{value} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
            array('email', 'checkEmail'),
            array('email', 'email', 'message' => Yii::t('language', 'รูปแบบอีเมล์ไม่ถูกต้อง')),
            array('id, user_id, corporation_registration, commerce_registration, type_business, product_name, product_name_en, trade_name, trade_name_en, business_name, business_name_en, tname, ftname, ltname, etname, fename, lename, sex, birth, email, address, province, prefecture, district, postcode, tel, mobile, fax, high_education, career, skill_com, receive_news', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'corporation_registration' => Yii::t('language', 'เลขนิติบุคคล'),
            'commerce_registration' => Yii::t('language', 'เลขพาณิชย์'),
            'type_business' => Yii::t('language', 'ประเภทธุรกิจ'),
            'product_name' => Yii::t('language', 'ชื่อสินค้า / บริการ'),
            'trade_name' => Yii::t('language', 'ชื่อทางการค้า'),
            'business_name' => Yii::t('language', 'ชื่อธุรกิจ'),
            'product_name_en' => Yii::t('language', 'ชื่อสินค้า / บริการภาษาอังกฤษ'),
            'trade_name_en' => Yii::t('language', 'ชื่อทางการค้าภาษาอังกฤษ'),
            'business_name_en' => Yii::t('language', 'ชื่อธุรกิจภาษาอังกฤษ'),
            'tname' => Yii::t('language', 'คำนำหน้าภาษาอังกฤษ'),
            'ftname' => Yii::t('language', 'ชื่อภาษาไทย'),
            'ltname' => Yii::t('language', 'นามสกุลภาษาไทย'),
            'etname' => Yii::t('language', 'คำนำหน้า'),
            'fename' => Yii::t('language', 'ชื่อภาษาอังกฤษ'),
            'lename' => Yii::t('language', 'นามสกุลภาษาอังกฤษ'),
            'sex' => Yii::t('language', 'เพศ'),
            'birth' => Yii::t('language', 'ปีเกิด'),
            'email' => Yii::t('language', 'อีเมล์'),
            'address' => Yii::t('language', 'ที่อยู่'),
            'province' => Yii::t('language', 'จังหวัด'),
            'prefecture' => Yii::t('language', 'อำเภอ'),
            'district' => Yii::t('language', 'ตำบล'),
            'postcode' => Yii::t('language', 'รหัสไปรษณีย์'),
            'tel' => Yii::t('language', 'เบอร์โทรศัพท์'),
            'mobile' => Yii::t('language', 'มือถือ'),
            'fax' => Yii::t('language', 'แฟกช์'),
            'high_education' => Yii::t('language', 'การศึกษาสูงสุด'),
            'career' => Yii::t('language', 'อาชีพ'),
            'skill_com' => Yii::t('language', 'ทักษะด้านคอมพิวเตอร์'),
            'receive_news' => Yii::t('language', 'รับข่าวสาร'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('corporation_registration', $this->corporation_registration, true);
        $criteria->compare('commerce_registration', $this->commerce_registration, true);
        $criteria->compare('type_business', $this->type_business);
        $criteria->compare('product_name', $this->product_name, true);
        $criteria->compare('trade_name', $this->trade_name, true);
        $criteria->compare('business_name', $this->business_name, true);
        $criteria->compare('tname', $this->tname);
        $criteria->compare('ftname', $this->ftname, true);
        $criteria->compare('ltname', $this->ltname, true);
        $criteria->compare('etname', $this->etname);
        $criteria->compare('fename', $this->fename, true);
        $criteria->compare('lename', $this->lename, true);
        $criteria->compare('sex', $this->sex);
        $criteria->compare('birth', $this->birth, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('province', $this->province);
        $criteria->compare('prefecture', $this->prefecture);
        $criteria->compare('district', $this->district);
        $criteria->compare('postcode', $this->postcode, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('high_education', $this->high_education);
        $criteria->compare('career', $this->career);
        $criteria->compare('skill_com', $this->skill_com);
        $criteria->compare('receive_news', $this->receive_news, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function checkEmail() {
//        if ($this->hasErrors() == NULL) {
        $model2 = MemPerson::model()->findByAttributes(array('email' => $this->email));
        if (!empty($model2)) {
            $this->addError('email', $this->model()->getAttributeLabel('email') . 'มีอยู่ในระบบแล้วกรุณาตรวจสอบ');
        }
//        }
    }

}