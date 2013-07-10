<?php

class TitleName extends TitleNameBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, language', 'required'),
            array('name', 'length', 'max' => 100),
            array('name', 'unique'),
            array('language', 'length', 'max' => 2),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, language', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
        );
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('language', $this->language, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getTitleName($language) {
        $list = CHtml::listData(TitleName::model()->findAll("language = '" . $language . "'"), 'id', 'name');
        return $list;
    }

    public function getData() {
        $criteria = new CDbCriteria;
        $criteria->order = 'id desc';
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('language', $this->language, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}