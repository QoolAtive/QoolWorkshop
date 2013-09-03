<?php

class MemPerson extends MemPersonBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('panit, user_id, mem_type, sex, tname, ftname, ltname, birth, email, facebook, twitter, address, province, prefecture, district, postcode, high_education, career, skill_com, receive_news', 'required'),
            array('user_id, business_type, mem_type, sex, tname, province, prefecture, district, high_education, career, skill_com', 'numerical', 'integerOnly' => true),
            array('product_name, panit, ftname, ltname, fename, lename, email, twitter, tel, mobile, fax', 'length', 'max' => 100),
            array('birth', 'length', 'max' => 4),
            array('facebook, address', 'length', 'max' => 255),
            array('postcode', 'length', 'max' => 5),
            array('email', 'email'),
            array('email', 'unique', 'message' => '{value} มีอยู่ในระบบแล้ว กรุณาตรวจสอบ'), // อีเมล์ห้ามซ้ำ
            array('email', 'checkEmail'),
            array('receive_news', 'length', 'max' => 1),
            array('user_id, business_type, product_name, id, mem_type, sex, tname, ftname, ltname, fename, lename, birth, email, facebook, twitter, address, province, prefecture, district, postcode, tel, mobile, fax, high_education, career, skill_com, receive_news', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'mem_type' => Yii::t('language', 'ประเภทผู้ใช้'),
            'sex' => Yii::t('language', 'เพศ'),
            'tname' => Yii::t('language', 'คำนำหน้า'),
            'ftname' => Yii::t('language', 'ชื่อภาษาไทย'),
            'ltname' => Yii::t('language', 'นามสกุลภาษาไทย'),
            'etname' => Yii::t('language', 'คำนำหน้าภาษาอังกฤษ'),
            'fename' => Yii::t('language', 'ชื่อภาษาอังกฤษ'),
            'lename' => Yii::t('language', 'นามสกุลภาษาอังกฤษ'),
            'birth' => Yii::t('language', 'ปีเกิด'),
            'email' => Yii::t('language', 'อีเมล์'),
            'facebook' => Yii::t('language', 'เฟสบุ๊ค'),
            'twitter' => Yii::t('language', 'ทวิตเตอร์'),
            'address' => Yii::t('language', 'ที่อยู่'),
            'province' => Yii::t('language', 'จังหวัด'),
            'prefecture' => Yii::t('language', 'อำเภอ'),
            'district' => Yii::t('language', 'ตำบล'),
            'postcode' => Yii::t('language', 'รหัสไปรษณีย์'),
            'tel' => Yii::t('language', 'โทรศัพท์'),
            'mobile' => Yii::t('language', 'มือถือ'),
            'fax' => Yii::t('language', 'แฟกซ์'),
            'high_education' => Yii::t('language', 'ระดับการศึกษาสูงสุด'),
            'career' => Yii::t('language', 'อาชีพ'),
            'skill_com' => Yii::t('language', 'Skill Com'),
            'receive_news' => Yii::t('language', 'รับข่าวสาร'),
            'product_name' => Yii::t('language', 'ชื่อสินค้า / บริการ'),
            'product_name_en' => Yii::t('language', 'ชื่อสินค้า / บริการ ภาษาอังกฤษ'),
            'panit' => Yii::t('language', 'เลขทะเบียนพาณิชย์'),
            'business_type' => Yii::t('language', 'ประเภทธุรกิจ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('mem_type', $this->mem_type);
        $criteria->compare('sex', $this->sex);
        $criteria->compare('tname', $this->tname);
        $criteria->compare('ftname', $this->ftname, true);
        $criteria->compare('ltname', $this->ltname, true);
        $criteria->compare('fename', $this->fename, true);
        $criteria->compare('lename', $this->lename, true);
        $criteria->compare('birth', $this->birth, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('facebook', $this->facebook, true);
        $criteria->compare('twitter', $this->twitter, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('province', $this->provice);
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
        $model2 = MemRegistration::model()->findByAttributes(array('email' => $this->email));
        if (!empty($model2)) {
            $this->addError('email', $this->email . ' มีอยู่ในระบบแล้วกรุณาตรวจสอบ');
        }
    }

}