<?php

class SpBanner extends SpBannerBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('com_id, path', 'required'),
            array('path', 'length', 'max' => 100),
            array('id, com_id, path', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'com_id' => 'Com',
            'path' => 'Path',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('com_id', $this->com_id, true);
        $criteria->compare('path', $this->path, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}