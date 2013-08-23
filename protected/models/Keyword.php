<?php

class Keyword extends KeywordBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('keyword_id, name', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'keyword_id' => 'Keyword',
            'name' => Yii::t('language', 'คีย์'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('keyword_id', $this->keyword_id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}