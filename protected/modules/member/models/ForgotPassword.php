<?php

class ForgotPassword extends CFormModel {

    public $username, $email;

    public function rules() {
        return array(
            array('email', 'required'),
            array('email', 'email', 'message' => '{attribute} ' . Yii::t('language', 'อีเมล์ของคุณไม่ถูกต้อง')),
        );
    }

    public function attributeLabels() {
        return array(
            'username' => Yii::t('language', 'ชื่อผู้ใช้งาน'),
            'email' => Yii::t('language', 'อีเมล์'),
        );
    }

}

?>
