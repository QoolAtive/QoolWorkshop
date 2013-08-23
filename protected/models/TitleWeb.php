<?php

class TitleWeb extends TitleWebBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('detail, status', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('detail, detail_en', 'length', 'max' => 500),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('title_web_id, detail, detail_en, status', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'title_web_id' => 'Title Web',
            'detail' => Yii::t('language', 'รายละเอียดภาษาไทย'),
            'detail_en' => Yii::t('language', 'รายละเอียดภาษาอังกฤษ'),
            'status' => Yii::t('language', 'สถานะ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('title_web_id', $this->title_web_id);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getStatus($data = null) {
        $status = array(
            '0' => Yii::t('language', 'ไม่ใช่งาน'),
            '1' => Yii::t('language', 'ใช้งาน'),
        );
        if ($data == null) {
            return $status;
        } else {
            return $status[$data];
        }
    }

}