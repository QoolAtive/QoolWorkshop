<?php

class PaymentSpecial extends PaymentSpecialBase {

    public $other1, $other1_en, $other2, $other2_en;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PaymentSpecial the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_id', 'required'),
            array('product_id, special_id', 'numerical', 'integerOnly' => true),
            array('other,other1, other2', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('payment_special_id, product_id, special_id, other, other_en, other1, other1_en, other2, other2_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'payment_special_id' => 'Payment Special',
            'product_id' => 'Product',
            'special_id' => Yii::t('language', 'สิทธิพิเศษ'),
            'other' => 'Other',
            'other1' => Yii::t('language', 'ระบุการให้ส่วนลดภาษาไทย'),
            'other2' => Yii::t('language', 'ระบุการให้เครดิตภาษาไทย'),
            'other1_en' => Yii::t('language', 'ระบุการให้ส่วนลดภาษาอังกฤษ'),
            'other2_en' => Yii::t('language', 'ระบุการให้เครดิตภาษาอังกฤษ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('payment_special_id', $this->payment_special_id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('special_id', $this->special_id);
        $criteria->compare('other', $this->other, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}