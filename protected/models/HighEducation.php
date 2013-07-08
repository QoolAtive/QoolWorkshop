<?php

class HighEducation extends HighEducationBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, abbreviation', 'required'),
            array('name, abbreviation', 'length', 'max' => 100),
            array('name', 'unique', 'message' => Yii::t('language', '{attribute}มีอยู่ในระบบแล้วกรุณาตรวจสอบ')),
            array('id, name, abbreviation', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'ขื่อ',
            'abbreviation' => 'คำย่อ',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('abbreviation', $this->abbreviation, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('abbreviation', $this->abbreviation, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getListData() {
        $list = CHtml::listData(HighEducation::model()->findAll(), 'id', 'name');
        return $list;
    }

}