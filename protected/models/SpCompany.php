<?php

class SpCompany extends SpCompanyBase {

    public $type_id;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, name_en, infor, infor_en, address, address_en, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, website', 'required'),
            array('type_business', 'numerical', 'integerOnly' => true),
            array('logo, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, twitter, banner, brochure', 'length', 'max' => 100),
            array('name, name_en, address, address_en, facebook, website', 'length', 'max' => 255),
            array('partner', 'length', 'max' => 1),
            array('id, logo, name, name_en, infor, infor_en, type_business, address, address_en, contact_name, contact_name_en, contact_tel, contact_fax, contact_email, facebook, twitter, website, banner, brochure, partner', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'logo' => Yii::t('language', 'โลโก้'),
            'name' => Yii::t('language', 'ชื่อบริษัท') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'name_en' => Yii::t('language', 'ชื่อบริษัท') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'infor' => Yii::t('language', 'เกี่ยวกับบริษัท') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'infor_en' => Yii::t('language', 'เกี่ยวกับบริษัท') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'type_business' => Yii::t('language', 'ประเภทธุรกิจ'),
            'address' => Yii::t('language', 'ที่อยู่') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'address_en' => Yii::t('language', 'ที่อยู่') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
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
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('infor', $this->infor, true);
        $criteria->compare('infor_en', $this->infor_en, true);
        $criteria->compare('type_business', $this->type_business);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('address_en', $this->address_en, true);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_name_en', $this->contact_name_en, true);
        $criteria->compare('contact_tel', $this->contact_tel, true);
        $criteria->compare('contact_email', $this->contact_email, true);
        $criteria->compare('facebook', $this->facebook, true);
        $criteria->compare('twitter', $this->twitter, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('banner', $this->banner, true);
        $criteria->compare('brochure', $this->brochure, true);
        $criteria->compare('partner', $this->partner, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;
        $criteria->order = 'id desc';
        $criteria->compare('id', $this->id);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('infor', $this->infor, true);
        $criteria->compare('infor_en', $this->infor_en, true);
        $criteria->compare('type_business', $this->type_business);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('address_en', $this->address_en, true);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_name_en', $this->contact_name_en, true);
        $criteria->compare('contact_tel', $this->contact_tel, true);
        $criteria->compare('contact_email', $this->contact_email, true);
        $criteria->compare('facebook', $this->facebook, true);
        $criteria->compare('twitter', $this->twitter, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('banner', $this->banner, true);
        $criteria->compare('brochure', $this->brochure, true);
        $criteria->compare('partner', $this->partner, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDataType($type = NULL) {

        $criteria = new CDbCriteria;
        $criteria->order = 'id desc';
        $criteria->select = "t.*, stc.type_id as type_id";
        $criteria->join = "
            left join sp_type_com stc on t.id = stc.com_id
            ";
        if ($type != null) {
            $criteria->condition = "stc.type_id = '" . $type . "'";
        }

        $criteria->compare('id', $this->id);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('infor', $this->infor, true);
        $criteria->compare('infor_en', $this->infor_en, true);
        $criteria->compare('type_business', $this->type_business);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('address_en', $this->address_en, true);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_name_en', $this->contact_name_en, true);
        $criteria->compare('contact_tel', $this->contact_tel, true);
        $criteria->compare('contact_email', $this->contact_email, true);
        $criteria->compare('facebook', $this->facebook, true);
        $criteria->compare('twitter', $this->twitter, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('banner', $this->banner, true);
        $criteria->compare('brochure', $this->brochure, true);
        $criteria->compare('partner', $this->partner, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 5,
            ),
        ));
    }

}