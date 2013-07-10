<?php

/**
 * This is the model class for table "link_web".
 *
 * The followings are the available columns in table 'link_web':
 * @property integer $id
 * @property integer $group_id
 * @property string $name
 * @property string $link
 * @property string $img_path
 * @property string $author
 * @property string $date_write
 *
 * The followings are the available model relations:
 * @property LinkGroup $group
 */
class LinkWeb extends LinkWebBase {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return LinkWeb the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'link_web';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('group_id, name_th, name_en, link, date_write', 'required'),# author,
            array('group_id', 'numerical', 'integerOnly' => true),
            array('name_th, name_en, link', 'length', 'max' => 255),
            array('author', 'length', 'max' => 100),
            array('id, img_path', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, group_id, name_th, name_en, link, img_path, author, date_write', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'group' => array(self::BELONGS_TO, 'LinkGroup', 'group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ลำดับที่',
            'group_id' => 'กลุ่ม',
            'name_th' => 'ชื่อภาษาไทย',
            'name_en' => 'ชื่อภาษาอังกฤษ',
            'link' => 'Link',
            'img_path' => 'รูปภาพ',
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

//		$criteria->compare('id',$this->id);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('link', $this->link, true);
//		$criteria->compare('img_path',$this->img_path,true);
//        $criteria->compare('author', $this->author, true);
        $criteria->compare('date_write', $this->date_write, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                ));
    }

}