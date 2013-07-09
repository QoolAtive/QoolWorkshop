<?php
class ChangePass extends MemUserBase {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return 'mem_user';
    }
    public function rules() {
        return array(
            array('username, password, type', 'required'),
            array('username, password', 'length', 'max' => 100),
            array('type', 'length', 'max' => 1),
            array('id, username, password, type', 'safe', 'on' => 'search'),
        );
    }
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
            'username' => 'Username',
            'password' => 'Password',
            'type' => 'Type',
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}