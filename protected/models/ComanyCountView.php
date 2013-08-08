<?php

class ComanyCountView extends ComanyCountViewBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('company_id, count_company_view, update_at', 'required'),
            array('company_id, count_company_view', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('company_count_view_id, company_id, count_company_view, update_at', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'company_count_view_id' => 'Company Count View',
            'company_id' => 'Company',
            'count_company_view' => 'Count Company View',
            'update_at' => 'Update At',
        );
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('company_count_view_id', $this->company_count_view_id);
        $criteria->compare('company_id', $this->company_id);
        $criteria->compare('count_company_view', $this->count_company_view);
        $criteria->compare('update_at', $this->update_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}