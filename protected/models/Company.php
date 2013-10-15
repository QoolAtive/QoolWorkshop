<?php

class Company extends CompanyBase {

    public $status_appro;
    public $update_at, $motion_status, $status_block, $date_warning; //company_motion

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('user_id, name, name_en, infor, infor_en, address, address_en, contact_name, contact_name_en, contact_tel, contact_email, website, registered', 'required'),
            array('user_id, verify', 'numerical', 'integerOnly' => true),
            array('name, name_en', 'unique', 'message' => '{value} มีอยู่ในระบบแล้ว กรุณาตรวจสอบ'),
            array('logo, main_business, main_business_en, sub_business, sub_business_en, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, twitter, banner, brochure', 'length', 'max' => 100),
            array('name, name_en, address, address_en, facebook, website', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('verify, id, user_id, logo, name, name_en, infor, infor_en, main_business, main_business_en, sub_business, sub_business_en, address, address_en, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, facebook, twitter, website, banner, brochure, registered', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'companyLicenses' => array(self::HAS_MANY, 'CompanyLicense', 'company_id'),
            'companyProducts' => array(self::HAS_MANY, 'CompanyProduct', 'main_id'),
            'companyThems' => array(self::HAS_MANY, 'CompanyThem', 'main_id'),
            'memCompanies' => array(self::HAS_MANY, 'MemCompany', 'com_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'logo' => Yii::t('language', 'โลโก้'),
            'name' => Yii::t('language', 'ชื่อร้านค้า') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'name_en' => Yii::t('language', 'ชื่อร้านค้า') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'infor' => Yii::t('language', 'เกี่ยวกับร้านค้า') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'infor_en' => Yii::t('language', 'เกี่ยวกับร้านค้า') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'type_business' => Yii::t('language', 'ประเภทธุรกิจ'),
            'address' => Yii::t('language', 'ที่อยู่') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'address_en' => Yii::t('language', 'ที่อยู่') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'main_business' => Yii::t('language', 'ธุรกิจหลัก') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'main_business_en' => Yii::t('language', 'ธุรกิจหลัก') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'sub_business' => Yii::t('language', 'ธุรกิจรอง') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'sub_business_en' => Yii::t('language', 'ธุรกิจรอง') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'contact_name' => Yii::t('language', 'ข้อมูลติดต่อ') . ' - ' . Yii::t('language', 'ชื่อบุคคล') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'contact_name_en' => Yii::t('language', 'ข้อมูลติดต่อ') . ' - ' . Yii::t('language', 'ชื่อบุคคล') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'contact_tel' => Yii::t('language', 'ข้อมูลติดต่อ') . ' - ' . Yii::t('language', 'โทร.'),
            'contact_fax' => Yii::t('language', 'ข้อมูลติดต่อ') . ' - ' . Yii::t('language', 'โทรสาร.'),
            'contact_email' => Yii::t('language', 'ข้อมูลติดต่อ') . ' - ' . Yii::t('language', 'อีเมล์'),
            'facebook' => Yii::t('language', 'เฟซบุ๊ก'),
            'twitter' => Yii::t('language', 'ทวิตเตอร์'),
            'website' => Yii::t('language', 'เว็บไซต์'),
            'banner' => Yii::t('language', 'แบนเนอร์'),
            'brochure' => Yii::t('language', 'โบรชัวร์'),
            'partner' => Yii::t('language', 'พาร์ทเนอร์'),
            'motion_status' => Yii::t('language', 'ประเภท'),
            'update_at' => Yii::t('language', 'อัพเดตล่าสุด'),
            'status_block' => Yii::t('language', 'สถานะ'),
            'date_warning' => Yii::t('language', 'แจ้งเตือน'),
            'verify' => Yii::t('language', 'เครื่องหมาย DBD Verified'),
            'registered' => Yii::t('language', 'เลขทะเบียนพาณิชย์'),
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
        $criteria->compare('registered', $this->registered);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
