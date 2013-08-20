<?php

class CompanyUpload extends CFormModel {

    public $file;

    public function rules() {
        return array(
            array('file','required'),
            array('file', 'file', 'types' => 'xls'),
        );
    }

    public function attributeLabels() {
        return array(
            'file' => Yii::t('language', 'ไฟล์'),
        );
    }

}

?>
