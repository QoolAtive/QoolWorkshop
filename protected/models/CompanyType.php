<?php

class CompanyType extends CompanyTypeBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('company_id, company_type', 'required'),
            array('company_id, company_type', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, company_id, company_type', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'company_id' => 'Company',
            'company_type' => Yii::t('language', 'ประเภทธุรกิจ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('company_id', $this->company_id);
        $criteria->compare('company_type', $this->company_type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}