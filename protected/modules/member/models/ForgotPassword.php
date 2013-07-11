<?php

class ForgotPassword extends CFormModel {

    public $username, $email;

    public function rules() {
        return array(
            array('email', 'required'),
            array('email', 'email', 'message' => '{attribute} ' . Yii::t('language', 'รูปแบบไม่ถูกต้อง')),
        );
    }

    public function attributeLabels() {
        return array(
            'username' => Yii::t('language', 'รหัสผู้ใช้'),
            'email' => Yii::t('language', 'อีเมล์'),
        );
    }

}

?>
