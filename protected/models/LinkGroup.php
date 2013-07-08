<?php

/**
 * This is the model class for table "link_group".
 *
 * The followings are the available columns in table 'link_group':
 * @property integer $id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property LinkWeb[] $linkWebs
 */
class LinkGroup extends LinkGroupBase {
    public $_old;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return LinkGroup the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'link_group';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 255),
            array('name', 'checkDup'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'linkWebs' => array(self::HAS_MANY, 'LinkWeb', 'group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'ชื่อกลุ่มลิงค์',
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

//        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                ));
    }

    public function checkDup() {
        if ($this->getErrors() == NULL) {
            if ($this->name != $this->_old) {
            $model = LinkGroup::model()->find("name = '" . $this->name . "'");
            if (!empty($model)) {
//                $label = LinkGroup::model()->getAttributeLabel('name');
                echo "<script>
                    alert('ชื่อกลุ่มลิ้งก์มีอยู่ในระบบแล้ว ไม่สมารถบันทึกซ้ำได้');               
                </script>";
//                    $this->addError('name', $label . 'มีอยู่ในระบบ กรุณาตรวจสอบ');
            }
            echo "<script>
                    alert('aaaa');               
                </script>";
            }
        }
    }

}