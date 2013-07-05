<?php

class MemUser extends MemUserBase {

    public $password_confirm, $member_name, $member_lname, $verifyCode;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            array('password_confirm, username, password, type, verifyCode', 'required'),
            array('password_confirm, username, password', 'length', 'max' => 100),
            array('type', 'length', 'max' => 1),
            array('username', 'CheckUser'),
            array('username', 'unique', 'message' => '{attribute}มีอยู่ในระบบแล้ว กรุณาตรวจสอบ'), // รหัสผู้ใช้ห้ามซ้ำ
            array('password', 'compare', 'compareAttribute' => 'password_confirm', 'message' => '{attribute}ไม่ตรงกัน กรุณาตรวจสอบ'),
            array('password_confirm, id, username, password, type', 'safe', 'on' => 'search'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()), // captcha
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => Yii::t('language', 'รหัสผู้ใช้'),
            'password' => Yii::t('language', 'รหัสผ่าน'),
            'type' => 'Type',
            'password_confirm' => Yii::t('language', 'ยืนยันรหัสผ่าน'),
            'member_name' => Yii::t('language', 'ชื่อ'),
            'verifyCode' => Yii::t('language', 'verifyCode'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDataRegistration() { // เรียก member ทั้งหมดยกเว้น admin
        $criteria = new CDbCriteria;
        $criteria->select = "t.*, r.ftname as member_name, r.ltname as member_lname";
        $criteria->join = "
            inner join mem_registration r on t.id = r.user_id
            ";
        $criteria->condition = "t.type = 2";

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('r.ftname', $this->member_name, true);
        $criteria->compare('r.ltname', $this->member_lname, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getDataPerson() { // เรียก member ทั้งหมดยกเว้น admin
        $criteria = new CDbCriteria;
        $criteria->select = "t.*, p.ftname as member_name, p.ltname as member_lname";
        $criteria->join = "
            left join mem_person p on t.id = p.user_id
            ";
        $criteria->condition = "t.type = 1";

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.username', $this->username, true);
        $criteria->compare('p.ftname', $this->member_name, true);
        $criteria->compare('p.ltname', $this->member_lname, true);
        $criteria->compare('t.password', $this->password, true);
        $criteria->compare('t.type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function CheckUser() {
        if (!$this->getErrors()) {
            if (Tool::CheckPID(Tool::Decrypted($this->username)) == false) { // เช็ค username ว่าเป็นรูปแบบของเลขบัตรประชาชนหรือไม่ และ มีอยู่ในระบบหรือเปล่า
                $this->addError('username', Yii::t('language', 'รหัสผู้ใช้รูปแบบไม่ถูกต้อง กรุณาตรวจสอบ'));
            } else {
                $model = MemUser::model()->findByAttributes(array('username' => $this->username));
                if (!empty($model))
                    $this->addError('username', Yii::t('language', 'รหัสผู้ใช้มีอยู่ในระบบแล้ว กรุณาตรวจสอบ'));
            }
            if (strlen(Tool::Decrypted($this->password)) < 6) { // เช็คว่ารหัสผ่านมีไม่น้อยกว่า 6 ตัวอักษร
                $this->addError('password', Yii::t('language', MemUser::model()->getAttributeLabel('password') . 'ต้องมีมากกว่าหรือเท่ากับ 6'));
            }
            if (ereg('[^0-9A-Za-z]', Tool::Decrypted($this->password))) { // เช็ครูปแบบรหัสผ่านว่าเป็น ภาษาอังกฤษ หรือ ตัวเลขหรือไม่?
                $this->addError('password', Yii::t('language', 'รูปแแบบ' . MemUser::model()->getAttributeLabel('password') . 'ไม่ถูกต้อง กรุณาตรวจสอบ'));
            }
        }
    }

    public function getRegistration() {// member นิติบุคคลที่ยังไม่ได้รับการยืนยันจาก admin
        $criteria = new CDbCriteria;
        $criteria->select = "t.*, concat(r.ftname, ' ', r.ltname) as member_name";
        $criteria->join = "
            left join mem_registration r on t.id = r.user_id
            inner join mem_confirm c on t.id = c.user_id
            ";
        $criteria->condition = "t.type = 2 and c.status = 0";

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('r.ftname', $this->member_name, true);
        $criteria->compare('r.ltname', $this->member_name, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}