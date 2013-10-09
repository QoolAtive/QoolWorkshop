<?php

/**
 * This is the model class for table "web_shop_item".
 *
 * The followings are the available columns in table 'web_shop_item':
 * @property integer $web_shop_item_id
 * @property integer $web_shop_id
 * @property string $name_th
 * @property string $name_en
 * @property double $price_normal
 * @property double $price_special
 * @property string $description_th
 * @property string $description_en
 * @property string $pic_1
 * @property string $pic_2
 * @property string $pic_3
 * @property string $pic_4
 * @property string $pic_5
 * @property string $pic_6
 * @property string $pic_7
 * @property string $pic_8
 * @property double $weight
 * @property string $category
 * @property string $item_state
 *
 * The followings are the available model relations:
 * @property WebShop $webShop
 * @property WebShopOrderDetail[] $webShopOrderDetails
 */
class WebShopItem extends WebShopItemBase {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return WebShopItemBase the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'web_shop_item';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('web_shop_id, name_th, name_en, price_normal, description_th, description_en, category, item_state', 'required'),
            array('web_shop_id', 'numerical', 'integerOnly' => true),
            array('price_normal, price_special, vat, weight', 'numerical'),
            array('name_th, name_en, description_en, pic_1, pic_2, pic_3, pic_4, pic_5, pic_6, pic_7, pic_8, category, item_state', 'length', 'max' => 100),
            array('pic_1, pic_2, pic_3, pic_4, pic_5, pic_6, pic_7, pic_8, weight', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('web_shop_item_id, web_shop_id, name_th, name_en, price_normal, price_special, vat, description_th, description_en, pic_1, pic_2, pic_3, pic_4, pic_5, pic_6, pic_7, pic_8, weight, category, item_state', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'webShopBoxItems' => array(self::HAS_MANY, 'WebShopBoxItem', 'web_shop_item_id'),
            'webShopCategoryItems' => array(self::HAS_MANY, 'WebShopCategoryItem', 'web_shop_item_id'),
            'webShop' => array(self::BELONGS_TO, 'WebShop', 'web_shop_id'),
            'webShopOrderDetails' => array(self::HAS_MANY, 'WebShopOrderDetail', 'web_shop_item_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'web_shop_item_id' => 'Web Shop Item',
            'web_shop_id' => 'Web Shop',
            'name_th' => Yii::t('language', 'ชื่อสินค้า') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'name_en' => Yii::t('language', 'ชื่อสินค้า') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'price_normal' => Yii::t('language', 'ราคาปกติ (บาท)'),
            'price_special' => Yii::t('language', 'ราคาพิเศษ (บาท)'),
            'description_th' => Yii::t('language', 'รายละเอียด') . ' (' . Yii::t('language', 'ภาษาไทย') . ')',
            'description_en' => Yii::t('language', 'รายละเอียด') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')',
            'vat' => Yii::t('language', 'ภาษีมูลค่าเพิ่ม (บาท)'),
            'pic_1' => Yii::t('language', 'รูปภาพ') . ' 1',
            'pic_2' => Yii::t('language', 'รูปภาพ') . ' 2',
            'pic_3' => Yii::t('language', 'รูปภาพ') . ' 3',
            'pic_4' => Yii::t('language', 'รูปภาพ') . ' 4',
            'pic_5' => Yii::t('language', 'รูปภาพ') . ' 5',
            'pic_6' => Yii::t('language', 'รูปภาพ') . ' 6',
            'pic_7' => Yii::t('language', 'รูปภาพ') . ' 7',
            'pic_8' => Yii::t('language', 'รูปภาพ') . ' 8',
            'weight' => Yii::t('language', 'น้ำหนัก (กรัม)'),
            'category' => Yii::t('language', 'หมวดหมู่สินค้า'),
            'item_state' => Yii::t('language', 'สภาพสินค้า'),
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

        $criteria->compare('web_shop_item_id', $this->web_shop_item_id);
        $criteria->compare('web_shop_id', $this->web_shop_id);
        $criteria->compare('name_th', $this->name_th, true);
        $criteria->compare('name_en', $this->name_en, true);
        $criteria->compare('price_normal', $this->price_normal);
        $criteria->compare('price_special', $this->price_special);
        $criteria->compare('description_th', $this->description_th, true);
        $criteria->compare('description_en', $this->description_en, true);
        $criteria->compare('pic_1', $this->pic_1, true);
        $criteria->compare('pic_2', $this->pic_2, true);
        $criteria->compare('pic_3', $this->pic_3, true);
        $criteria->compare('pic_4', $this->pic_4, true);
        $criteria->compare('pic_5', $this->pic_5, true);
        $criteria->compare('pic_6', $this->pic_6, true);
        $criteria->compare('pic_7', $this->pic_7, true);
        $criteria->compare('pic_8', $this->pic_8, true);
        $criteria->compare('weight', $this->weight);
        $criteria->compare('category', $this->category);
        $criteria->compare('item_state', $this->item_state, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));
    }

}