<?php

class SpTypeBusinessSub extends SpTypeBusinessSubBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('sp_type_business, name_th', 'required'),
            array('sp_type_business', 'numerical', 'integerOnly' => true),
            array('name_th, name_en', 'length', 'max' => 255),
            array('about_th, about_en', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('sp_type_business_sub_id, sp_type_business, name_th, name_en, about_th, about_en', 'safe', 'on' => 'search'),
            array('name_th', 'UniqueAttributesValidator', 'with' => 'sp_type_business', 'message' => '{attribute} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
        );
    }

    public function attributeLabels() {
        return array(
            'sp_type_business_sub_id' => Yii::t('language', 'ประภทบริการหลัก'),
            'sp_type_business' => Yii::t('language', 'ประภทบริการหลัก'),
            'name_th' => Yii::t('language', 'ประเภทบริการย่อย') . Yii::t('language', 'ภาษาไทย'),
            'name_en' => Yii::t('language', 'ประเภทบริการย่อย') . Yii::t('language', 'ภาษาอังกฤษ'),
            'about_th' => Yii::t('language', 'รายละเอียด') . Yii::t('language', 'ภาษาไทย'),
            'about_en' => Yii::t('language', 'รายละเอียด') . Yii::t('language', 'ภาษาอังกฤษ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('sp_type_business_sub_id', $this->sp_type_business_sub_id);
        $criteria->compare('sp_type_business', $this->sp_type_business);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;
        $criteria->order = 'sp_type_business asc';
        $criteria->compare('sp_type_business', $this->sp_type_business);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getMultiSelect() {
        $data = array();

        foreach (SpTypeBusiness::model()->findAll() as $d1) {

            $data[$d1->name] = array();
            $c = new CDbCriteria();
            $c->condition = 'sp_type_business = ' . $d1->id;
            $c->order = 'name_th asc, sp_type_business_sub_id desc';
            foreach ($this->model()->findAll($c) as $d) {
                $data[$d1->name][$d->sp_type_business_sub_id] = $d->name_th;
            }
        }
        return $data;
    }

}