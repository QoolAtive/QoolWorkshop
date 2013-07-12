<?php

class LearningGroup extends LearningGroupBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, pic', 'required'),
            array('name', 'unique', 'message' => '{attribute} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
            array('name, pic, name_en, pic_en', 'length', 'max' => 255),
            array('id, name, pic, name_en, pic_en', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('language', 'หัวข้อ'),
            'pic' => Yii::t('language', 'รูป'),
            'name_en' => Yii::t('language', 'หัวข้อภาษาอังกฤษ'),
            'pic_en' => Yii::t('language', 'รูปภาษาอังกฤษ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('pic_en', $this->pic_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('pic_en', $this->pic_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getListData() {
        return CHtml::listData($this->model()->findAll(), 'id', 'name');
    }

}