<?php

class LearningFile extends LearningFileBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('main_id, path', 'required'),
            array('main_id', 'numerical', 'integerOnly' => true),
            array('path', 'length', 'max' => 100),
            array('id, main_id, path', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'main_id' => 'Main',
            'path' => 'Path',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('path', $this->path, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}