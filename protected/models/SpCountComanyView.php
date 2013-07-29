<?php

class SpCountComanyView extends SpCountComanyViewBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('sp_company_id, count_company_view, update_at', 'required'),
            array('sp_id, sp_company_id, count_company_view', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('sp_id, sp_company_id, count_company_view, update_at', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'sp_id' => 'Sp',
            'sp_company_id' => 'Sp Company',
            'count_company_view' => 'Count Company View',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('sp_id', $this->sp_id);
        $criteria->compare('sp_company_id', $this->sp_company_id);
        $criteria->compare('count_company_view', $this->count_company_view);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}