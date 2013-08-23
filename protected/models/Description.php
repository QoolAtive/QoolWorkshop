<?php

class Description extends DescriptionBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('detail, status', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('description_id, detail, status', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'description_id' => 'Description',
            'detail' => Yii::t('language', 'รายละเอียด'),
            'status' => Yii::t('language', 'สถานะ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('description_id', $this->description_id);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}