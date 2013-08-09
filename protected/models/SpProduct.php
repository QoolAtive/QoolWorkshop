<?php

class SpProduct extends SpProductBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('main_id, name, name_en, detail, detail_en, guide, date_write', 'required'),
            array('main_id', 'numerical', 'integerOnly' => true),
            array('image, name, name_en', 'length', 'max' => 255),
            array('guide', 'length', 'max' => 1),
            array('image', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true),
            array('id, image, main_id, name, name_en, detail, detail_en, guide, date_write', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'main_id' => 'Main',
            'image' => Yii::t('language', 'รูปภาพ'),
            'name' => Yii::t('language', 'ชื่อภาษาไทย'),
            'name_en' => Yii::t('language', 'ชื่อภาษาอังกฤษ'),
            'detail' => Yii::t('language', 'รายละเอียดภาษาไทย'),
            'detail_en' => Yii::t('language', 'รายละเอียดภาษาอังกฤษ'),
            'guide' => Yii::t('language', 'สถานะ'),
            'date_write' => Yii::t('language', 'date_write'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('detail_en', $this->detail_en, true);
        $criteria->compare('guide', $this->guide, true);
        $criteria->compare('date_write', $this->date_write, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData($id = null) {
        $criteria = new CDbCriteria;

        if ($id != null) {
            $criteria->condition = "main_id = $id";
        }

        $criteria->order = "guide = 1 desc, id desc";
        $criteria->compare('id', $this->id);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('detail_en', $this->detail_en, true);
        $criteria->compare('guide', $this->guide, true);
        $criteria->compare('date_write', $this->date_write, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDataTypeList($p = '', $arr_data = false) {
        $arr = array(
            '0' => Yii::t('language', 'สินค้าใหม่'),
            '1' => Yii::t('language', 'สินค้าขายดี'),
            '2' => Yii::t('language', 'โปรโมชั่น'),
        );
        if ($arr_data) {
            return $arr;
        } else {
            return $arr[$p];
        }
    }

}