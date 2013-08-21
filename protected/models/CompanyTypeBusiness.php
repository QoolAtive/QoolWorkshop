<?php

class CompanyTypeBusiness extends CompanyTypeBusinessBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('name, name_en', 'length', 'max' => 255),
            array('id,name', 'unique', 'message' => '{attribute}มีอยู่ในระบบแล้ว กรุณาตรวบสอบ'),
            array('id, name, name_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('language', 'ลำดับ'),
            'name' => Yii::t('language', 'ประเภทภาษาไทย'),
            'name_en' => Yii::t('language', 'ประเภทภาษาอังกฤษ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public function getData() {
        $criteria = new CDbCriteria;
        $criteria->order = 'id desc';
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getListData() {
        $list = CHtml::listData(CompanyTypeBusiness::model()->findAll(), 'id', 'name');
        return $list;
    }

}