<?php

/**
 * This is the model class for table "news_mail".
 *
 * The followings are the available columns in table 'news_mail':
 * @property string $email
 */
class NewsMail extends NewsMailBase {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return NewsMailBase the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news_mail';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'required'),
            array('email', 'email'),
            array('email', 'checkDup'),
            array('email', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('news_mail_id, email', 'safe', 'on' => 'search'),
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
            'news_mail_id' => 'News Mail ID',
            'email' => 'E-mail',
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

        $criteria->compare('email', $this->email, true);

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
            $criteria->addCondition("(" . $attribute . " = '" . $this->$attribute . "' )");
            $model = NewsMail::model()->find($criteria);
            if (!empty($model)) {
                $label = LinkGroup::model()->getAttributeLabel($attribute);
                $this->addError($attribute, Yii::t('language', 'E-mail นี้มีอยู่ในระบบแล้ว '));
            }
        }
    }

}