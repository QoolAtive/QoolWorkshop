<?php

/**
 * This is the model class for table "faq_main".
 *
 * The followings are the available columns in table 'faq_main':
 * @property integer $id
 * @property string $name
 */
class FaqMain extends FaqMainBase {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return FaqMainBase the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'faq_main';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name_th, name_en, order_n', 'required'),
            array('order_n', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name_th, name_en, order_n', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'faqQuestions' => array(self::HAS_MANY, 'FaqQuestion', 'fm_id'),
            'faqSubs' => array(self::HAS_MANY, 'FaqSub', 'faq_main_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name_th' => 'ชื่อหมวดหมู่หลักภาษาไทย',
            'name_en' => 'ชื่อหมวดหมู่หลักภาษาอังกฤษ',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('order_n', $this->order_n);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 'order_n'),
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));
    }

}