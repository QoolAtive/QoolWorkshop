<?php

/**
 * This is the model class for table "faq_sub".
 *
 * The followings are the available columns in table 'faq_sub':
 * @property integer $faq_sub_id
 * @property integer $faq_main_id
 * @property string $name_th
 * @property string $name_en
 *
 * The followings are the available model relations:
 * @property FaqMain $faqMain
 */
class FaqSub extends FaqSubBase {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return FaqSubBase the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'faq_sub';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('faq_main_id, name_th, name_en, order_n', 'required'),
            array('faq_main_id, order_n', 'numerical', 'integerOnly' => true),
            array('name_th, name_en', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('faq_sub_id, faq_main_id, name_th, name_en, order_n', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'faqQuestions' => array(self::HAS_MANY, 'FaqQuestion', 'fs_id'),
            'faqMain' => array(self::BELONGS_TO, 'FaqMain', 'faq_main_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'faq_sub_id' => 'Faq Sub',
            'faq_main_id' => Yii::t('language', 'ชื่อหมวดหมู่หลัก'),
            'name_th' => Yii::t('language', 'ชื่อหมวดหมู่ย่อย') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'name_en' => Yii::t('language', 'ชื่อหมวดหมู่ย่อย') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'order_n' => 'Order N',
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

        $criteria->compare('faq_sub_id', $this->faq_sub_id);
        $criteria->compare('faq_main_id', $this->faq_main_id);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);
//        $criteria->compare('order_n', $this->order_n);
//        $criteria->order = 'faq_main_id';
        
        $criteria->join = 'left join faq_main on faq_main.id = t.faq_main_id';
        $criteria->order = 'faq_main.order_n , t.order_n';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 'order_n'),
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));
    }

}