<?php

class Knowledge extends KnowledgeBase {

    public $_old;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type_id, subject, detail, guide_status, date_write, position', 'required'),
            array('type_id, position, count', 'numerical', 'integerOnly' => true),
            array('subject, subject_en', 'length', 'max' => 255),
            array('guide_status', 'length', 'max' => 1),
            array('image', 'length', 'max' => 100),
            array('subject', 'unique'),
//            array('subject', 'checkDup'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('subject_en, detail_en, id, type_id, subject, detail, guide_status, date_write, position, _old, count', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'position0' => array(self::BELONGS_TO, 'KnowledgePosition', 'position'),
            'knowledgeThems' => array(self::HAS_MANY, 'KnowledgeThem', 'main_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'subject_en' => Yii::t('language', 'หัวข้อ'). ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'detail_en' => Yii::t('language', 'รายละเอียด'). ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'id' => 'ID',
            'type_id' => Yii::t('language', 'ประเภทบทความ'),
            'subject' => Yii::t('language', 'หัวข้อ') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'detail' => Yii::t('language', 'รายละเอียด') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'guide_status' => Yii::t('language', 'บทความแนะนำ'),
            'date_write' => Yii::t('language', 'วันที่เขียนบทความ'),
            'position' => 'Position',
            'image' => Yii::t('language', 'รูปภาพ'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('guide_status', $this->guide_status, true);
        $criteria->compare('date_write', $this->date_write, true);
        $criteria->compare('position', $this->position);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getKnowledgeHot($knowledge_type_id = null) {
        $criteria = new CDbCriteria;

        if ($knowledge_type_id != null) {
            $criteria->condition = "type_id = {$knowledge_type_id}";
        }

        $criteria->order = 'count desc, id desc';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 3,
            ),
        ));
    }

    public function getDataQuery($con) {
        $criteria = new CDbCriteria;
        if ($con != '') {
            $condition = "date_write between '" . $con['date_start'] . "' and '" . $con['date_end'] . "'";

            if ($con['subject'] != NULL) {
                $condition .= " and subject like '%" . $con['subject'] . "%' ";
            }
            if ($con['type_id'] != null) {
                $condition .= " and type_id = {$con['type_id']}";
            }
            $criteria->condition = $condition;
        }
        $criteria->compare('id', $this->id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('guide_status', $this->guide_status, true);
        $criteria->compare('date_write', $this->date_write, true);
        $criteria->compare('position', $this->position);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getData($guide = '', $knowledge_type_id = '') {
        $criteria = new CDbCriteria;
        if ($guide != '') {
            $criteria->condition = "guide_status = '1'";
            $pages = '3';
            $criteria->order = 'date_write desc';
        } else {
            $criteria->order = 'date_write desc';
            $pages = '12';
        }

        if ($knowledge_type_id != null) {
            $criteria->addCondition("type_id = {$knowledge_type_id}");
        }

        $criteria->compare('id', $this->id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('guide_status', $this->guide_status, true);
        $criteria->compare('date_write', $this->date_write, true);
        $criteria->compare('position', $this->position);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $pages,
            ),
        ));
    }

    public function getGuideKnowledge() {
        $criteria = new CDbCriteria;
        $criteria->condition = "guide_status = '1'";
        $criteria->compare('id', $this->id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('guide_status', $this->guide_status, true);
        $criteria->compare('date_write', $this->date_write, true);
        $criteria->compare('position', $this->position);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDataManage() {
        $criteria = new CDbCriteria;
        $criteria->order = "guide_status = 1 desc, id desc";
        $criteria->compare('id', $this->id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('guide_status', $this->guide_status, true);
        $criteria->compare('date_write', $this->date_write, true);
        $criteria->compare('position', $this->position);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDataTypeList($p = '', $arr_data = false) {
        $arr = array(
            '0' => Yii::t('language', 'ไม่แนะนำ'),
            '1' => Yii::t('language', 'แนะนำ'),
        );
        if ($arr_data) {
            return $arr;
        } else {
            return $arr[$p];
        }
    }

//    public function checkDup() {
//        if ($this->getErrors() == NULL) {
//            if ($this->subject != $this->_old) {
//                $model = Knowledge::model()->find("subject = '" . $this->subject . "'");
//                if (!empty($model)) {
//                    $label = Knowledge::model()->getAttributeLabel('subject');
//                    $this->addError('subject', $label . Yii::t('language', 'มีอยู่ในระบบ กรุณาตรวจสอบ'));
//                }
//            }
//        }
//    }
}