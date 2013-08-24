<?php

class SpLog extends SpLogBase {

    public $companyName, $companyName_en; // ใชห้หน้า serviceProvider/default/spLog

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, service_company_id', 'required'),
            array('user_id, service_company_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('sp_log_id, user_id, service_company_id, companyName, companyName_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'sp_log_id' => 'Sp Log',
            'user_id' => 'User',
            'companyName' => Yii::t('language', 'บริการภาษาไทย'),
            'companyName_en' => Yii::t('language', 'บริการภาษาอังกฤษ'),
            'service_company_id' => Yii::t('language', 'บริการ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('sp_log_id', $this->sp_log_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('service_company_id', $this->service_company_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}