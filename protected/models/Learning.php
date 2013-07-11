<?php

class Learning extends LearningBase {

    public $group_name;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('group_id, subject, detail, author, guide_status, date_write', 'required'),
            array('group_id', 'numerical', 'integerOnly' => true),
            array('subject', 'unique', 'message' => '{attribute} ' . Yii::t('language', 'มีอยู่ในระบบแล้ว กรุณาตรวจสอบ')),
            array('subject', 'length', 'max' => 255),
            array('author', 'length', 'max' => 100),
            array('guide_status', 'length', 'max' => 1),
            array('id, group_id, subject, detail, author, guide_status, date_write', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'group_name' => Yii::t('language', 'กลุ่มบทเรียน'),
            'subject' => Yii::t('language', 'หัวข้อ'),
            'detail' => Yii::t('language', 'รายละเอียด'),
            'author' => Yii::t('language', 'ผู้เขียน'),
            'guide_status' => Yii::t('language', 'แนะนำ'),
            'date_write' => Yii::t('language', 'วันที่เขียน'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('guide_status', $this->guide_status, true);
        $criteria->compare('date_write', $this->date_write, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData() {
        $criteria = new CDbCriteria;
        $criteria->select = "t.*, lg.name as group_name";
        $criteria->join = "left join learning_group lg on t.group_id = lg.id";
        $criteria->compare('id', $this->id);
        $criteria->compare('lg.id', $this->group_name);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('guide_status', $this->guide_status, true);
        $criteria->compare('date_write', $this->date_write, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}