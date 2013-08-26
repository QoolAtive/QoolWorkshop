<?php

class ShopController extends Controller {

    public $format;
    public $shop;

    public function init() {
        Yii::app()->theme = 'web_sim';
        parent::init();
    }

    public function settingShop($id) {
        $model = WebShop::model()->findByPk($id);
        $this->shop = $model;
        $format = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $id));
        $this->format = $format;
        return $model;
    }

    public function actionIndex($id) {
//        $model = WebShop::model()->findByPk($id);
//        $this->shop = $model;
//        $format = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $id));
//        $this->format = $format;
        $model = $this->settingShop($id);
//        Yii::app()->getClientScript()->registerCssFile(yii::app()->theme->baseUrl . '/' . $format['theme'] . '/css/style.css', 'screen');
        if ($model != NULL) {
            $this->render('index', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

    public function actionProductShop($id) {
        $model = $this->settingShop($id);
        
        if ($model != NULL) {
            $this->render('product_shop', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

    public function actionPayShop($id) {
        $model = $this->settingShop($id);
        
        if ($model != NULL) {
            $this->render('pay_shop', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

    public function actionAboutShop($id) {
        $model = $this->settingShop($id);
        
        if ($model != NULL) {
            $this->render('about_shop', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

    public function actionProductDetail($id, $p_id) {
        $model = $this->settingShop($id);

        $model_item = WebShopItem::model()->findByPk($p_id);

        if ($model_item != NULL) {
            $this->render('product_detail', array(
                'id' => $id,
                'p_id' => $p_id,
                'item_detail' => $model_item,
            ));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบสินค้าที่ท่านต้องการ'));
        }
    }
    
    public function actionCategory($id, $category_id){
        $model = $this->settingShop($id);
        $category = WebShopCategory::model()->findByPk($category_id);
        if ($category != NULL) {
            $this->render('category', array(
                'id' => $id,
                'category_id' => $category_id,
                'category' => $category,
            ));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบหมวดหมู่ที่ท่านต้องการ'));
        }
    }
    
    public function actionBox($id, $box_id){
        $model = $this->settingShop($id);
        $box = WebShopBox::model()->findByPk($box_id);
        if ($box != NULL) {
            $this->render('box', array(
                'id' => $id,
                'box_id' => $box_id,
                'box' => $box,
            ));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบกล่องแสดงสินค้าที่ท่านต้องการ'));
        }
    }

    public function actionSearch($id, $keyword){
        $model = $this->settingShop($id);
    }

}