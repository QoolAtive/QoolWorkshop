<?php

/**
 * This is the model class for table "news_group".
 *
 * The followings are the available columns in table 'news_group':
 * @property integer $id
 * @property string $name_th
 * @property string $name_en
 */
class NewsGroup extends NewsGroupBase {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return NewsGroupBase the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news_group';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name_th, name_en', 'required'),
            array('name_th, name_en', 'length', 'max' => 255),
            array('name_th, name_en', 'checkDup'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name_th, name_en', 'safe', 'on' => 'search'),
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
            'name_th' => Yii::t('language', 'ชื่อ').' ('.Yii::t('language', 'ภาษาไทย').') ',
            'name_en' => Yii::t('language', 'ชื่อ').' ('.Yii::t('language', 'ภาษาอังกฤษ').') ',
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

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));
    }

    public function checkDup($attribute) {
        if ($this->getErrors() == NULL) {
            $criteria = new CDbCriteria;
            if ($this->id == NULL) {
                $criteria->addCondition("(" . $attribute . " = '" . $this->$attribute . "' )");
            } else {
                $criteria->addCondition("(" . $attribute . " = '" . $this->$attribute . "' and id != " . $this->id . " )");
            }
            $model = NewsGroup::model()->find($criteria);
            if (!empty($model)) {
                $label = NewsGroup::model()->getAttributeLabel($attribute);
                $this->addError($attribute, $label . Yii::t('language', 'มีอยู่ในระบบ กรุณาตรวจสอบ'));
            }
        }
    }

}