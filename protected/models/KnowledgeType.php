<?php

class KnowledgeType extends KnowledgeTypeBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name_th', 'required'),
            array('name_th, name_en', 'length', 'max' => 255),
            array('name_th', 'unique', 'message' => '{attribute} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('knowledge_type_id, name_th, name_en', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'knowledge_type_id' => 'Knowledge Type',
            'name_th' => Yii::t('language', 'ประเภทภาษาไทย'),
            'name_en' => Yii::t('langauge', 'ประเภทภาษาอังกฤษ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('knowledge_type_id', $this->knowledge_type_id);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;

        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getList($select = null) {
        $data = array();
        foreach ($this->model()->findAll() as $d) {
            $data[$d->knowledge_type_id] = $d->name_th;
        }

        if ($select == null) {
            return $data;
        } else {
            return $data[$select];
        }
    }

}