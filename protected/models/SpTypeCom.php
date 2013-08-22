<?php

class SpTypeCom extends SpTypeComBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('com_id, type_id', 'required'),
            array('com_id', 'numerical', 'integerOnly' => true),
            array('type_id', 'length', 'max' => 3),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, com_id, type_id', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'com_id' => 'Com',
            'type_id' => Yii::t('language', 'ประเภทผู้ให้บริการ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('com_id', $this->com_id);
        $criteria->compare('type_id', $this->type_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}