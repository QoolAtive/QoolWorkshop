<?php

class KnowledgeCount extends KnowledgeCountBase {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('user_id, count', 'required'),
            array('user_id, count', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('knowledge_count_id, user_id, count', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'knowledge_count_id' => 'Knowledge Count',
            'user_id' => 'User',
            'count' => 'Count',
        );
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('knowledge_count_id', $this->knowledge_count_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('count', $this->count);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}