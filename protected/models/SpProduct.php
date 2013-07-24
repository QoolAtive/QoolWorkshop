<?php

class SpProduct extends SpProductBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('main_id, name, detail, guide, date_write', 'required'),
            array('main_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('guide', 'length', 'max' => 1),
            array('id, main_id, name, detail, guide, date_write', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'main_id' => 'Main',
            'name' => 'Name',
            'detail' => 'Detail',
            'guide' => 'Guide',
            'date_write' => 'Date Write',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('guide', $this->guide, true);
        $criteria->compare('date_write', $this->date_write, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}