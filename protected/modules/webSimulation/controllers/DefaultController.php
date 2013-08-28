<?php

class DefaultController extends Controller {

    public function actionIndex() {
        unset(Yii::app()->session['shop_id']);
        $this->render('index');
    }
    
}