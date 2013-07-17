<?php

class Upload extends CFormModel {

    public $file;

    public function rules() {
        return array(
            array('file', 'file', 'types' => 'pdf'),
        );
    }

    public function attributeLabels() {
        return array(
            'file' => Yii::t('language', 'ไฟล์แนบ'),
        );
    }

}

?>
