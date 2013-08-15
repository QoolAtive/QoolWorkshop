<?php

class CompanyMotion extends CompanyMotionBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, company_id, status, update_at', 'required'),
            array('user_id, company_id, status', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('company_motion_id, user_id, company_id, status, update_at', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'company_motion_id' => 'Company Motion',
            'user_id' => 'User',
            'company_id' => 'Company',
            'status' => Yii::t('language','ประเภท'),
            'date_warnning' => Yii::t('language','วันที่แจ้งเตือน'),
            'update_at' => Yii::t('language', 'วันที่อัพเดตล่าสุด'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('company_motion_id', $this->company_motion_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('company_id', $this->company_id);
        $criteria->compare('status', $this->status);
        $criteria->compare('update_at', $this->update_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function dataStatus($data = null) {
        $status = array(
            '1' => Yii::t('language', 'ข้อมูลร้านค้า'),
            '2' => Yii::t('language', 'ข้อมูลสินค้า'),
        );
        if ($data == null) {
            return $status;
        } else {
            return $status[$data];
        }
    }

    public function blockStatus($data = null) {
        $status = array(
            '0' => Yii::t('language', 'อยู่ในระบบ'),
            '1' => Yii::t('language', 'แจ้งเตือน'),
        );
        if ($data == null) {
            return $status;
        } else {
            return $status[$data];
        }
    }

}