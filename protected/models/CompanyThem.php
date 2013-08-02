<?php

class CompanyThem extends CompanyThemBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('main_id, status_appro, date_write', 'required'),
            array('main_id, status_appro', 'numerical', 'integerOnly' => true),
            array('date_appro', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, main_id, status_appro, date_write, date_appro', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'main_id' => 'Main',
            'status_appro' => 'Status Appro',
            'date_write' => 'Date Write',
            'date_appro' => 'Date Appro',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('status_appro', $this->status_appro);
        $criteria->compare('date_write', $this->date_write, true);
        $criteria->compare('date_appro', $this->date_appro, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}