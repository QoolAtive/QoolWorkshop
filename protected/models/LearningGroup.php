<?php

class LearningGroup extends LearningGroupBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, pic,name_en, pic_en', 'required'),
            array('name', 'unique', 'message' => '{attribute} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
            array('name, pic, name_en, pic_en', 'length', 'max' => 255),
            array('id, name, pic, name_en, pic_en', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('language', 'หัวข้อ') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'pic' => Yii::t('language', 'รูปภาพ') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'name_en' => Yii::t('language', 'หัวข้อ') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'pic_en' => Yii::t('language', 'รูปภาพ') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('pic_en', $this->pic_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;

        $criteria->order = 'id asc';
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('pic_en', $this->pic_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getListData() {
        return CHtml::listData($this->model()->findAll(), 'id', LanguageHelper::changeDB('name', 'name_en'));
    }

    public function getGroupList($p = '', $arr_data = false) {
        $arr = array();
        $data_list = $this->model()->findAll();
        foreach ($data_list as $data) {
            $d[$data['id']] = LanguageHelper::changeDB($data['name'], $data['name_en']);
        }
        $arr = $d;
        if ($arr_data) {
            return $arr;
        } else {
            return $arr[$p];
        }
    }

}