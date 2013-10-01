<?php

class SiteMap extends SiteMapBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, link', 'required'),
            array('main_id, sub_id, sort', 'numerical', 'integerOnly' => true),
            array('name, name_en, link', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('site_map_id, name, name_en, link, main_id, sub_id, sort', 'safe', 'on' => 'search'),
            array('name', 'unique', 'message' => '{attribute} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
        );
    }

    public function attributeLabels() {
        return array(
            'site_map_id' => Yii::t('language', 'รหัส'),
            'name' => Yii::t('language', 'ชื่อหัวข้อ') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'name_en' => Yii::t('language', 'ชื่อหัวข้อ') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'link' => Yii::t('language', 'ที่อยู่ลิงก์'),
            'main_id' => Yii::t('language', 'หมวดหมู่หลัก'),
            'sub_id' => Yii::t('language', 'หมวดหมู่ย่อย'),
            'sort' => Yii::t('language', 'ลำดับการแสดงผล'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('site_map_id', $this->site_map_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('sub_id', $this->sub_id);
        $criteria->compare('sort', $this->sort);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {

        $criteria = new CDbCriteria;

        $criteria->compare('site_map_id', $this->site_map_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('sub_id', $this->sub_id);
        $criteria->compare('sort', $this->sort);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDataArray($data = null) {
        if ($data == null) {
            $dataArray = array();
            foreach ($this->model()->findAll() as $d) {
                $dataArray[$d->site_map_id] = LanguageHelper::changeDB($d->name, $d->name_en);
            }
            return $dataArray;
        } else {
            $model = $this->model()->findByPk($data);
            if (!empty($model)) {
                $res = LanguageHelper::changeDB($model->name, $model->name_en);
                return $res;
            } else {
                return ' - ';
            }
        }
    }

}