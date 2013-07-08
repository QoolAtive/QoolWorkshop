<?php

class MemConfirm extends MemConfirmBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('user_id, password', 'required'),
            array('user_id, status', 'numerical', 'integerOnly' => true),
            array('password', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, password, status', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'รหัสสมาชิก',
            'password' => 'Password',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}