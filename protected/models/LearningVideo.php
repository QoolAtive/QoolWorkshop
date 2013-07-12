<?php

class LearningVideo extends LearningVideoBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'learning_video';
    }

    public function rules() {
        return array(
            array('main_id, video, video_en', 'required'),
            array('main_id', 'numerical', 'integerOnly' => true),
            array('video', 'length', 'max' => 100),
            array('video_en', 'length', 'max' => 255),
            array('id, main_id, video, video_en', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'main_id' => 'Main',
            'video' => Yii::t('language', 'ลิ้งวิดีโอจากยูทูป'),
            'video_en' => Yii::t('language', 'ลิ้งวิดีโอจากยูทูป'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('main_id', $this->main_id);
        $criteria->compare('video', $this->video, true);
        $criteria->compare('video_en', $this->video, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}