<?php

class Upload extends CFormModel {

    public $image, $image2;

    public function rules() {
        return array(
            array('image, image2', 'file', 'types' => 'jpg, gif, png'),
        );
    }

    public function attributeLabels() {
        return array(
            'image' => Yii::t('language', 'รูปภาพ'),
            'image2' => Yii::t('language', 'รูปภาพภาษาอังกฤษ'),
        );
    }

}

?>
