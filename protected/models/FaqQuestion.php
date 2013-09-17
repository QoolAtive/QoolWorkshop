<?php

/**
 * This is the model class for table "faq_question".
 *
 * The followings are the available columns in table 'faq_question':
 * @property integer $id
 * @property integer $fm_id
 * @property string $subject_th
 * @property string $detail_th
 * @property string $author
 * @property string $date_write
 */
class FaqQuestion extends FaqQuestionBase {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return FaqQuestionBase the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'faq_question';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fm_id, fs_id, subject_th, subject_en, detail_th, detail_en, date_write, counter', 'required'),
            array('fm_id', 'numerical', 'integerOnly' => true),
            array('subject_th', 'length', 'max' => 255),
            array('author', 'length', 'max' => 100),
            array('author, counter', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, fm_id, fs_id, subject_th, subject_en, detail_th, detail_en, author, date_write, counter', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'fs' => array(self::BELONGS_TO, 'FaqSub', 'fs_id'),
            'fm' => array(self::BELONGS_TO, 'FaqMain', 'fm_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'fm_id' => 'Fm',
            'fs_id' => Yii::t('language', 'หมวดหมู่คำถามย่อย'),
            'subject_th' => Yii::t('language', ' คำถาม ') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'detail_th' => Yii::t('language', ' คำตอบ ') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'subject_en' => Yii::t('language', ' คำถาม ') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'detail_en' => Yii::t('language', ' คำตอบ ') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'author' => Yii::t('language', 'ผู้เขียน'),
            'date_write' => Yii::t('language', 'วันที่เขียน'),
            'counter' => 'Counter',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('fm_id', $this->fm_id);
        $criteria->compare('fs_id', $this->fs_id);
        $criteria->compare('subject_th', $this->subject_th, true);
        $criteria->compare('detail_th', $this->detail_th, true);
        $criteria->compare('subject_en', $this->subject_en, true);
        $criteria->compare('detail_en', $this->detail_en, true);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('date_write', $this->date_write, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));
    }

}