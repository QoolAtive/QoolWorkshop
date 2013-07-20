<?php

class HighEducation extends HighEducationBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, abbreviation', 'required'),
            array('name, name_en, abbreviation, abbreviation_en', 'length', 'max' => 100),
            array('name, name_en', 'unique', 'message' => Yii::t('language', '{attribute}' . Yii::t('language', 'มีอยู่ในระบบแล้วกรุณาตรวจสอบ'))),
            array('id, name, name_en, abbreviation, abbreviation_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => yii::t('language', 'ขื่อ'),
            'abbreviation' => yii::t('language', 'ขื่อ'),
            'name_en' => yii::t('language', 'ขื่อภาษาอังกฤษ'),
            'abbreviation_en' => yii::t('language', 'ขื่อภาษาอังกฤษ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('abbreviation', $this->abbreviation, true);
        $criteria->compare('abbreviation_en', $this->abbreviation_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;
        $criteria->order = 'id desc';
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('abbreviation', $this->abbreviation, true);
        $criteria->compare('abbreviation_en', $this->abbreviation_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getListData() {
        $list = CHtml::listData(HighEducation::model()->findAll(), 'id', 'name');
        return $list;
    }

}