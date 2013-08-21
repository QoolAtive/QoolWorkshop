<?php

class ShopController extends Controller {

    public $format;
    public $shop;

    public function init() {
        Yii::app()->theme = 'web_sim';
        parent::init();
    }

    public function actionIndex($id) {
        $model = WebShop::model()->findByPk($id);
        $this->shop = $model;
        $format = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $id));
        $this->format = $format;
//        Yii::app()->getClientScript()->registerCssFile(yii::app()->theme->baseUrl . '/' . $format['theme'] . '/css/style.css', 'screen');
        if ($model != NULL) {
            $this->render('index', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

}