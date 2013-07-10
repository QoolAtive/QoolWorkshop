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
            array('fm_id, subject_th, date_write, detail_th', 'required'), # author,
            array('fm_id', 'numerical', 'integerOnly' => true),
            array('subject_th', 'length', 'max' => 255),
            array('author', 'length', 'max' => 100),
            array('author', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, fm_id, subject_th, detail_th, author, date_write', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'fm_id' => 'Fm',
            'subject_th' => 'คำถาม',
            'detail_th' => 'คำตอบ',
            'subject_en' => 'คำถาม',
            'detail_en' => 'คำตอบ',
            'author' => 'Author',
            'date_write' => 'Date Write',
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
        $criteria->compare('subject_th', $this->subject_th, true);
        $criteria->compare('detail_th', $this->detail_th, true);
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