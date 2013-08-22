<?php

class SpTypeBusiness extends SpTypeBusinessBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, name_en', 'required'),
            array('name, name_en', 'unique', 'message' => '{attribute} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
            array('name', 'length', 'max' => 255),
            array('about', 'safe'),
            array('id, name, name_en, about', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('language', 'ชื่อภาษาไทย'),
            'about' => Yii::t('language', 'รายละเอียดภาษาไทย'),
            'name_en' => Yii::t('language', 'ชื่อภาษาอังกฤษ'),
            'about_en' => Yii::t('language', 'รายละเอียดภาษาอังกฤษ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('about', $this->about, true);
        $criteria->compare('about_en', $this->about_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;
        $criteria->order = 'id desc, name';
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('about', $this->about, true);
        $criteria->compare('about_en', $this->about_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDataList() {
        $field = LanguageHelper::changeDB('name', 'name_en');
        return CHtml::listData($this->model()->findAll(), 'id', $field);
    }

}