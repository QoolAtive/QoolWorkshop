<?php

class TitleName extends TitleNameBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name, name_en', 'required'),
            array('name, name_en', 'length', 'max' => 100),
            array('name, name_en', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, name_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('language', 'คำนำหน้าชื่อ') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'name_en' => Yii::t('language', 'คำนำหน้าชื่อ') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
        );
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getTitleNameThai() {
        $list = CHtml::listData(TitleName::model()->findAll(), 'id', 'name');
        return $list;
    }

    public function getTitleNameEng() {
        $list = CHtml::listData(TitleName::model()->findAll(), 'id', 'name_en');
        return $list;
    }

    public function getData() {
        $criteria = new CDbCriteria;
        $criteria->order = 'id desc';
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}