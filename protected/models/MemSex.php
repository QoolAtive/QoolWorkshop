<?php

class MemSex extends MemSexBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name, name_en', 'length', 'max' => 20),
            array('name, name_en', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('language', 'เพศภาษาไทย'),
            'name_en' => Yii::t('language', 'เพศภาษาอังกฤษ'),
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

    public function getSex() {
        $list = CHtml::listData(MemSex::model()->findAll(), 'id', 'name');
        return $list;
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

}