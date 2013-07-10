<?php

class ChangeAddressForm extends CFormModel {

    public $address, $province, $prefecture, $district, $postcode;

    public function rules() {
        return array(
            array('address, province, prefecture, district, postcode', 'required'),
            array('province, prefecture, district, postcode', 'numerical', 'integerOnly' => true),
            array('postcode', 'length', 'max' => 5),
            array('address', 'length', 'max' => 225),
        );
    }

    public function attributeLabels() {
        return array(
            'address' => Yii::t('language', 'ที่อยู่'),
            'province' => Yii::t('language', 'จังหวัด'),
            'prefecture' => Yii::t('language', 'อำเภอ'),
            'district' => Yii::t('language', 'ตำบล'),
            'postcode' => Yii::t('language', 'รหัสไปรษณีย์'),
        );
    }

}
