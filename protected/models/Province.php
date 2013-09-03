<?php

class Province extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'province';
    }

    public function rules() {
        return array(
            array('name, zone_id', 'required'),
            array('zone_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, zone_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'districts' => array(self::HAS_MANY, 'District', 'province_id'),
            'memPeople' => array(self::HAS_MANY, 'MemPerson', 'province'),
            'memRegistrations' => array(self::HAS_MANY, 'MemRegistration', 'province'),
            'prefectures' => array(self::HAS_MANY, 'Prefecture', 'province_id'),
            'zone' => array(self::BELONGS_TO, 'Zone', 'zone_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'zone_id' => 'Zone',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('zone_id', $this->zone_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getListProvince() {
//        $c = new CDbCriteria();
//        $c->order = 'name ASC';
        $list = CHtml::listData(Province::model()->findAll(array('order' => 'name_th ASC')), 'id', Yii::t('language', 'name_th'));
        return $list;
    }

}