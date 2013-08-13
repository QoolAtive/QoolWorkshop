<?php

class CompanyMotionSetting extends CompanyMotionSettingBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('amount, type, use', 'required'),
            array('amount, use', 'numerical', 'integerOnly' => true),
            array('type', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('company_motion_setting_id, amount, type, use', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'company_motion_setting_id' => 'Company Motion Setting',
            'amount' => Yii::t('language', 'จำนวน'),
            'type' => Yii::t('language', 'ประเภท'),
            'use' => Yii::t('language', 'เลือกใช้'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('company_motion_setting_id', $this->company_motion_setting_id);
        $criteria->compare('amount', $this->amount);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function ListUse($data = null) {

        $dataUse = array(
            '0' => Yii::t('language', 'ไม่เลือกใช้งาน'),
            '1' => Yii::t('language', 'เลือกใช้งาน'),
        );

        if ($data == null) {
            return $dataUse;
        } else {
            return $dataUse[$data];
        }
    }

}