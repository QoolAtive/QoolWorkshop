<?php

/**
 * This is the model class for table "web_shop".
 *
 * The followings are the available columns in table 'web_shop':
 * @property integer $web_shop_id
 * @property integer $mem_user_id
 * @property string $name_th
 * @property string $name_en
 * @property integer $web_shop_catagory_id
 * @property string $url
 * @property string $description_th
 * @property string $description_en
 * @property string $address_th
 * @property string $address_en
 * @property integer $province_id
 * @property integer $prefecture_id
 * @property integer $district_id
 * @property integer $postcode
 * @property string $mobile
 * @property string $tel
 * @property string $email
 * @property string $creat_at
 *
 * The followings are the available model relations:
 * @property Province $province
 * @property Prefecture $prefecture
 * @property District $district
 */
class WebShop extends WebShopBase {

    public $full_name;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return WebShopBase the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'web_shop';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('mem_user_id, name_th, name_en, web_shop_catagory_id, url, description_th, description_en, address_th, address_en, province_id, prefecture_id, district_id, postcode, mobile, email, creat_at', 'required'),
            array('mem_user_id, web_shop_catagory_id, province_id, prefecture_id, district_id, postcode', 'numerical', 'integerOnly' => true),
            array('email', 'email'),
            array('mobile, tel, email', 'length', 'max' => 100),
            array('name_th, name_en, url, address_th, address_en', 'length', 'max' => 255),
            array('how_to_buy_th, how_to_buy_en, full_name', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('web_shop_id, mem_user_id, name_th, name_en, web_shop_catagory_id, url, description_th, description_en, how_to_buy_th, how_to_buy_en, address_th, address_en, province_id, prefecture_id, district_id, postcode, mobile, tel, email, creat_at, full_name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'province' => array(self::BELONGS_TO, 'Province', 'province_id'),
            'prefecture' => array(self::BELONGS_TO, 'Prefecture', 'prefecture_id'),
            'district' => array(self::BELONGS_TO, 'District', 'district_id'),
            'memUser' => array(self::BELONGS_TO, 'MemUser', 'mem_user_id'),
            'webShopBoxes' => array(self::HAS_MANY, 'WebShopBox', 'web_shop_id'),
            'webShopBoxItems' => array(self::HAS_MANY, 'WebShopBoxItem', 'web_shop_id'),
            'webShopCategoryItems' => array(self::HAS_MANY, 'WebShopCategoryItem', 'web_shop_id'),
            'webShopFormats' => array(self::HAS_MANY, 'WebShopFormat', 'web_shop_id'),
            'webShopItems' => array(self::HAS_MANY, 'WebShopItem', 'web_shop_id'),
            'webShopOrderDetails' => array(self::HAS_MANY, 'WebShopOrderDetail', 'web_shop_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'web_shop_id' => Yii::t('language', 'id'),
            'mem_user_id' => Yii::t('language', 'ชื่อสมาชิกเจ้าของร้าน'),
            'name_th' => Yii::t('language', 'ชื่อร้าน') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'name_en' => Yii::t('language', 'ชื่อร้าน') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'web_shop_catagory_id' => Yii::t('language', 'หมวดหมู่ร้านค้า'),
            'url' => Yii::t('language', 'ที่อยู่ลิงก์'),
            'description_th' => Yii::t('language', 'รายละเอียดร้านค้าโดยย่อ') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'description_en' => Yii::t('language', 'รายละเอียดร้านค้าโดยย่อ') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'how_to_buy_th' => Yii::t('language', 'วิธีสั่งซื้อและชำระเงิน') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'how_to_buy_en' => Yii::t('language', 'วิธีสั่งซื้อและชำระเงิน') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'address_th' => Yii::t('language', 'ที่อยู่') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'address_en' => Yii::t('language', 'ที่อยู่') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'province_id' => Yii::t('language', 'จังหวัด'),
            'prefecture_id' => Yii::t('language', 'อำเภอ/ เขต'),
            'district_id' => Yii::t('language', 'ตำบล/ แขวง'),
            'postcode' => Yii::t('language', 'รหัสไปรษณีย์'),
            'mobile' => Yii::t('language', 'โทรศัพท์มือถือ'),
            'tel' => Yii::t('language', 'โทรศัพท์'),
            'email' => Yii::t('language', 'Email'),
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

        $criteria->join = 'left join mem_person on mem_person.user_id = t.mem_user_id';
        $criteria->compare('mem_person.ftname', $this->full_name, true, 'OR');
        $criteria->compare('mem_person.ltname', $this->full_name, true, 'OR');
        $criteria->compare('mem_person.fename', $this->full_name, true, 'OR');
        $criteria->compare('mem_person.lename', $this->full_name, true, 'OR');

        $criteria->compare('web_shop_id', $this->web_shop_id);
        $criteria->compare('mem_user_id', $this->mem_user_id);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('web_shop_catagory_id', $this->web_shop_catagory_id);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('description_th', $this->description_th, true);
        $criteria->compare('description_en', $this->description_en, true);
        $criteria->compare('how_to_buy_th', $this->how_to_buy_th, true);
        $criteria->compare('how_to_buy_en', $this->how_to_buy_en, true);
        $criteria->compare('address_th', $this->address_th, true);
        $criteria->compare('address_en', $this->address_en, true);
        $criteria->compare('province_id', $this->province_id);
        $criteria->compare('prefecture_id', $this->prefecture_id);
        $criteria->compare('district_id', $this->district_id);
        $criteria->compare('postcode', $this->postcode);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('creat_at', $this->creat_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));
    }

}