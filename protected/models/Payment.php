<?php

class Payment extends PaymentBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, name_en, num', 'required'),
            array('num', 'numerical', 'integerOnly' => true),
            array('name, name_en', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('payment_id, name, name_en, num', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'payment_id' => 'Payment',
            'name' => Yii::t('language', 'เงื่อนไขการชำระเงินภาษาไทย'),
            'name_en' => Yii::t('language', 'เงื่อนไขการชำระเงินภาษาอังกฤษ'),
            'num' => Yii::t('language', 'ลำดับการแสดงผล'),
        );
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('payment_id', $this->payment_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('num', $this->num);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getListData() {
        $list = CHtml::listData($this->model()->findAll(), 'payment_id', 'name');
        return $list;
    }

    public static function getListDataOption($data = null) {
        $status = array(
            '0' => Yii::t('language', 'ให้ส่วนลด'),
            '1' => Yii::t('language', 'ให้เครดิต'),
        );

        if ($data == null) {
            return $status;
        } else {
            return $status[$data];
        }
    }

}