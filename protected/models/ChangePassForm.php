<?php

class ChangePassForm extends CFormModel {

    public $old_password;
    public $password;
    public $re_password;

    public function rules() {
        return array(
            array('old_password, re_password, password', 'required'),
            array('password', 'compare', 'compareAttribute' => 're_password', 'message' => '{attribute}ไม่ตรงกัน กรุณาตรวจสอบ'),
            array('old_password', 'chkOldPassword'),
//            array('password', 'match', 'pattern' => '/[a-z0-9A-Z]/', 'message' => 'รูปแบบรหัสผ่านไม่ถูกต้อง'),
        );
    }

    public function attributeLabels() {
        return array(
            'old_password' => Yii::t('language', 'รหัสผ่านเดิม'),
            'password' => Yii::t('language', 'รหัสผ่าน'),
            're_password' => Yii::t('language', 'ยืนยันรหัสผ่าน'),
        );
    }

    public function chkOldPassword() {
        $model_user = MemUser::model()->findByPk(Yii::app()->user->id);
        $password = "'" . Tool::Decrypted($model_user->password) . "'";
        $password_con = "'" . $this->old_password . "'";
        if ($password != $password_con) { // เช็ครหัสเดิม
            $this->addError('old_password', $this->getAttributeLabel('old_password') . Yii::t('language', ' ไม่ถูกต้อง'));
        }

        if ($this->hasErrors() == null) {
            if (!preg_match('/[a-z0-9A-Z]/', $this->password)) {// เช็ครูปแบบรหัสผ่าน
                $this->addError('password', $this->getAttributeLabel('password') . Yii::t('language', ' รูปแบบไม่เป็นไปตามกำหนด(a - z, 0-9, A-Z)'));
            }
            if (strlen($this->password) < 6) {
                $this->addError('password', $this->getAttributeLabel('password') . Yii::t('language', 'ต้องมีมากกว่าหรือเท่ากับ 6'));
            }
        }
    }

}
