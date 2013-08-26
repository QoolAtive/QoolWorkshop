<?php

class CompanyDelivery extends CompanyDeliveryBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, name_en, num', 'required'),
            array('num', 'numerical', 'integerOnly' => true),
            array('name, name_en', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('company_delivery_id, name, name_en, num', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'company_delivery_id' => 'Company Delivery',
            'name' => Yii::t('language', 'บริการจัดส่ง').' ('.Yii::t('language', 'ภาษาไทย').')',
            'name_en' => Yii::t('language', 'บริการจัดส่ง').' ('.Yii::t('language', 'ภาษาอังกฤษ').')',
            'num' => Yii::t('language', 'ลำดับการแสดงผล'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('company_delivery_id', $this->company_delivery_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('num', $this->num);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getListData() {        
        $field = LanguageHelper::changeDB('name', 'name_en');
        $list = CHtml::listData($this->model()->findAll(), 'company_delivery_id', $field);
        return $list;
    }

}