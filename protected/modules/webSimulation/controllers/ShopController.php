<?php

class ShopController extends Controller {

    public $layout='//layouts/web_sim_main';
    
    public function actionIndex($id) {
        $model = WebShop::model()->findByPk($id);
        if ($model != NULL) {
            $this->render('index', array('id' => $id));
        } else {
            throw new CHttpException(404, Yii::t('language', 'ไม่พบร้านค้าที่ท่านต้องการ'));
        }
    }

}