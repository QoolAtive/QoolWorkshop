<?php

class DelivSer extends DelivSerBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('com_id, delivery_id', 'required'),
            array('com_id, delivery_id, option, option2', 'numerical', 'integerOnly' => true),
            array('other, other2', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('deliv_ser_id, com_id, delivery_id, other, other_en, other2, other2_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'deliv_ser_id' => 'Deliv Ser',
            'com_id' => 'Com',
            'delivery_id' => Yii::t('language', 'บริการจัดส่ง'),
            'option' => Yii::t('language', 'มีการจัดส่ง'),
            'option2' => Yii::t('language', 'ในประเทศ'),
            'delivery_id' => Yii::t('language', 'บริการจัดส่ง'),
            'other' => Yii::t('language', 'ระบุอื่นๆ') . ' (' . Yii::t('language', 'ในประเทศ') . Yii::t('language', 'ภาษาไทย') .')',
            'other2' => Yii::t('language', 'ระบุอื่นๆ') . ' (' . Yii::t('language', 'ต่างประเทศ') . Yii::t('language', 'ภาษาไทย') .')',
            'other_en' => Yii::t('language', 'ระบุอื่นๆ') . ' (' . Yii::t('language', 'ในประเทศ') . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'other2_en' => Yii::t('language', 'ระบุอื่นๆ') . ' (' . Yii::t('language', 'ในประเทศ') . Yii::t('language', 'ภาษาอังกฤษ') . ')',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('deliv_ser_id', $this->deliv_ser_id);
        $criteria->compare('com_id', $this->com_id);
        $criteria->compare('delivery_id', $this->delivery_id);
        $criteria->compare('other', $this->other, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}