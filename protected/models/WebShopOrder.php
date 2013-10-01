<?php

/**
 * This is the model class for table "web_shop_order".
 *
 * The followings are the available columns in table 'web_shop_order':
 * @property integer $web_shop_order_id
 * @property integer $web_shop_id
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_tel
 * @property double $price_all
 * @property string $order_at
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property WebShopOrderDetail[] $webShopOrderDetails
 */
class WebShopOrder extends WebShopOrderBase {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return WebShopOrderBase the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'web_shop_order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('web_shop_id, customer_name, customer_email, customer_tel, price_all, order_at, status', 'required'),
            array('web_shop_id, status', 'numerical', 'integerOnly' => true),
            array('customer_email', 'email'),
            array('price_all', 'numerical'),
            array('customer_name, customer_email, customer_tel, track_code', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('web_shop_order_id, web_shop_id, customer_name, customer_email, customer_tel, price_all, track_code, order_at, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'webShopOrderDetails' => array(self::HAS_MANY, 'WebShopOrderDetail', 'web_shop_order_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'web_shop_order_id' => Yii::t('language', 'Web Shop Order'),
            'web_shop_id' => Yii::t('language', 'Web Shop'),
            'customer_name' => Yii::t('language', 'ชื่อลูกค้า'),
            'customer_email' => Yii::t('language', 'อีเมล์'),
            'customer_tel' => Yii::t('language', 'โทรศัพท์'),
            'price_all' => Yii::t('language', 'ราคา (บาท)'),
            'track_code' => Yii::t('language', 'เลขพัสดุ'),
            'order_at' => Yii::t('language', 'วันที่สั่ง'),
            'status' => Yii::t('language', 'สถานะการส่ง'),
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

//		$criteria->compare('web_shop_order_id',$this->web_shop_order_id);
        $criteria->compare('web_shop_id', $this->web_shop_id);
        $criteria->compare('customer_name', $this->customer_name, true);
        $criteria->compare('customer_email', $this->customer_email, true);
        $criteria->compare('customer_tel', $this->customer_tel, true);
        $criteria->compare('price_all', $this->price_all);
        $criteria->compare('track_code', $this->track_code, true);
        $criteria->compare('order_at', $this->order_at, true);
        $criteria->compare('status', $this->status);
        $criteria->order = 'order_at DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));
    }

}