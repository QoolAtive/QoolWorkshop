<?php

class PaymentCondition extends PaymentConditionBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('product_id, payment_id', 'required'),
            array('product_id, payment_id', 'numerical', 'integerOnly' => true),
            array('other', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('payment_condition_id, product_id, payment_id, other, other_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'payment_condition_id' => 'Payment Condition',
            'product_id' => 'Product',
            'payment_id' => Yii::t('language', 'เงื่อนไขการชำระเงิน'),
            'option' => Yii::t('language', 'สิทธิพิเศษ'),
            'other' => Yii::t('language', 'ระบุภาษาไทย'),
            'other_en' => Yii::t('language', 'ระบุภาษาอังกฤษ'),
            'other2' => Yii::t('language', 'จำนวนส่วนลด'),
            'other3' => Yii::t('language', 'จำนวนเครดิต'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('payment_condition_id', $this->payment_condition_id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('payment_id', $this->payment_id);
        $criteria->compare('other', $this->other, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}