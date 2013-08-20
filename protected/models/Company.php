<?php

class Company extends CompanyBase {

    public $status_appro;
    public $update_at, $motion_status, $status_block, $date_warning; //company_motion

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('user_id, name, name_en, infor, infor_en, address, address_en, contact_name, contact_name_en, contact_tel, contact_email, website', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('name, name_en', 'unique', 'message' => '{value} มีอยู่ในระบบแล้ว กรุณาตรวจสอบ'),
            array('logo, main_business, main_business_en, sub_business, sub_business_en, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, twitter, banner, brochure', 'length', 'max' => 100),
            array('name, name_en, address, address_en, facebook, website', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, logo, name, name_en, infor, infor_en, main_business, main_business_en, sub_business, sub_business_en, address, address_en, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, facebook, twitter, website, banner, brochure', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'logo' => Yii::t('language', 'โลโก้'),
            'name' => Yii::t('language', 'ชื่อร้านค้าภาษาไทย'),
            'name_en' => Yii::t('language', 'ชื่อร้านค้าภาษาอังกฤษ'),
            'infor' => Yii::t('language', 'เกี่ยวกับร้านค้าภาษาไทย'),
            'infor_en' => Yii::t('language', 'เกี่ยวกับร้านค้าภาษาอังกฤษ'),
            'type_business' => Yii::t('language', 'ประเภทธุรกิจ'),
            'address' => Yii::t('language', 'ที่อยู่ภาษาไทย'),
            'address_en' => Yii::t('language', 'ที่อยู่ภาษาอังกฤษ'),
            'main_business' => Yii::t('language', 'ธุรกิจหลักภาษาไทย'),
            'main_business_en' => Yii::t('language', 'ธุรกิจหลักภาษาอังกฤษ'),
            'sub_business' => Yii::t('language', 'ธุรกิจรองภาษาไทย'),
            'sub_business_en' => Yii::t('language', 'ธุรกิจรองภาษาอังกฤษ'),
            'contact_name' => Yii::t('language', 'ข้อมูลติดต่อ - ชื่อบุคคลภาษาไทย'),
            'contact_name_en' => Yii::t('language', 'ข้อมูลติดต่อ - ชื่อบุคคลภาษาอังกฤษ'),
            'contact_tel' => Yii::t('language', 'ข้อมูลติดต่อ - เบอร์โทรศัพท์'),
            'contact_fax' => Yii::t('language', 'ข้อมูลติดต่อ - แฟกซ์'),
            'contact_email' => Yii::t('language', 'ข้อมูลติดต่อ - อีเมล์'),
            'facebook' => Yii::t('language', 'เฟสบุค'),
            'twitter' => Yii::t('language', 'ทวิตเตอร์'),
            'website' => Yii::t('language', 'เว็บไซต์'),
            'banner' => Yii::t('language', 'แบนเนอร์'),
            'brochure' => Yii::t('language', 'โบรชัวร์'),
            'partner' => Yii::t('language', 'หุ้นส่วน'),
            'motion_status' => Yii::t('language', 'ประเภท'),
            'update_at' => Yii::t('language', 'อัพเดตล่าสุด'),
            'status_block' => Yii::t('language', 'สถานะ'),
            'date_warning' => Yii::t('language', 'แจ้งเตือน'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('infor', $this->infor, true);
        $criteria->compare('infor_en', $this->infor_en, true);
        $criteria->compare('main_business', $this->main_business, true);
        $criteria->compare('main_business_en', $this->main_business_en, true);
        $criteria->compare('sub_business', $this->sub_business, true);
        $criteria->compare('sub_business_en', $this->sub_business_en, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('address_en', $this->address_en, true);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_name_en', $this->contact_name_en, true);
        $criteria->compare('contact_tel', $this->contact_tel, true);
        $criteria->compare('contact_fax', $this->contact_fax, true);
        $criteria->compare('contact_email', $this->contact_email, true);
        $criteria->compare('facebook', $this->facebook, true);
        $criteria->compare('twitter', $this->twitter, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('banner', $this->banner, true);
        $criteria->compare('brochure', $this->brochure, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}