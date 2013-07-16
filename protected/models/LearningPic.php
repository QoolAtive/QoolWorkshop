<?php

class LearningPic extends LearningPicBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
//            array('main_id, pic', 'required'),
            array('main_id', 'numerical', 'integerOnly' => true),
            array('pic', 'length', 'max' => 100),
            array('id, main_id, pic', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'main_id' => 'Main',
            'pic' => 'Pic',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('pic', $this->pic, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}