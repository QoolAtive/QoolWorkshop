<?php

class CompanySubTypeBusiness extends CompanySubTypeBusinessBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('company_type_business_id, name_th', 'required'),
            array('company_type_business_id', 'numerical', 'integerOnly' => true),
            array('name_th, name_en', 'length', 'max' => 255),
            array('name_th', 'unique', 'message' => '{attribute} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('company_sub_type_business_id, company_type_business_id, name_th, name_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'company_sub_type_business_id' => 'Company Sub Type Business',
            'company_type_business_id' => Yii::t('language', 'ประเภทร้านค้าหลัก'),
            'name_th' => Yii::t('language', 'ประเภทร้านค้าย่อย') . Yii::t('language', '(ภาษาไทย)'),
            'name_en' => Yii::t('language', 'ประเภทร้านค้าย่อย') . Yii::t('language', '(อังกฤษ)'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('company_sub_type_business_id', $this->company_sub_type_business_id);
        $criteria->compare('company_type_business_id', $this->company_type_business_id);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;

        $criteria->compare('company_sub_type_business_id', $this->company_sub_type_business_id);
        $criteria->compare('company_type_business_id', $this->company_type_business_id);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}