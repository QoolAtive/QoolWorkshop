<?php

class CompanyBrochure extends CompanyBrochureBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('com_id, path', 'required'),
            array('com_id', 'numerical', 'integerOnly' => true),
            array('path', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('company_brochure_id, com_id, path', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'company_brochure_id' => 'Company Brochure',
            'com_id' => 'Com',
            'path' => 'Path',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('company_brochure_id', $this->company_brochure_id);
        $criteria->compare('com_id', $this->com_id);
        $criteria->compare('path', $this->path, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}