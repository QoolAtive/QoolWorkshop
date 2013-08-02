<?php

class CompanyProduct extends CompanyProductBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('main_id, pic, name, name_en, detail, detail_en, date_write', 'required'),
            array('main_id', 'numerical', 'integerOnly' => true),
            array('pic', 'length', 'max' => 100),
            array('name, name_en', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, main_id, pic, name, name_en, detail, detail_en, date_write', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'main_id' => 'Main',
            'pic' => 'Pic',
            'name' => 'Name',
            'name_en' => 'Name En',
            'detail' => 'Detail',
            'detail_en' => 'Detail En',
            'date_write' => 'Date Write',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('detail_en', $this->detail_en, true);
        $criteria->compare('date_write', $this->date_write, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}