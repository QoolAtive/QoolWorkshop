<?php

class SpTypeBusinessSub extends SpTypeBusinessSubBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name_th', 'unique', 'message' => '{attribute} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
            array('sp_type_business, name_th', 'required'),
            array('sp_type_business', 'numerical', 'integerOnly' => true),
            array('name_th, name_en', 'length', 'max' => 255),
            array('about_th, about_en', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('sp_type_business_sub_id, sp_type_business, name_th, name_en, about_th, about_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'sp_type_business' => Yii::t('language', 'ประภทบริการหลัก'),
            'name_th' => Yii::t('language', 'ประเภทบริการย่อย') . Yii::t('language', 'ภาษาไทย'),
            'name_en' => Yii::t('language', 'ประเภทบริการย่อย') . Yii::t('language', 'ภาษาอังกฤษ'),
            'about_th' => Yii::t('language', 'รายละเอียด') . Yii::t('language', 'ภาษาไทย'),
            'about_en' => Yii::t('language', 'รายละเอียด') . Yii::t('language', 'ภาษาอังกฤษ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('sp_type_business_sub_id', $this->sp_type_business_sub_id);
        $criteria->compare('sp_type_business', $this->sp_type_business);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;

        $criteria->compare('sp_type_business', $this->sp_type_business);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}