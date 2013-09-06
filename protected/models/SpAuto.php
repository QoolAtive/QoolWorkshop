<?php

class SpAuto extends SpAutoBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getArray($select = null) {
        $data = array();
        foreach ($this->model()->findAll() as $m) {
            $data[] = $m->name;
        }
        return $data;
    }

}