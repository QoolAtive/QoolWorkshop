<?php

class RegisterConfirm extends CFormModel {
    public $register_confirm;
    public function rules() {
        return array(
            array('register_confirm', 'required'),
        );
    }
    public function attributeLabels() {
        return array(
            'register_confirm' => 'รหัสการยืนยัน',
        );
    }

}

?>
