<?php

class ManageShopController extends Controller {

    public function actionIndex() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/self/change_district.js');
        $model = new WebShop();
        if (isset($_POST['WebShop'])) {
            $model->attributes = $_POST['WebShop'];
            $model->mem_user_id = Yii::app()->user->id;
            $model->creat_at = date("Y-m-d H:i:s");
            if ($model->save()) {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes')) . "';
                  </script>";
            }
        }
        $this->render('index', array('model' => $model));
    }
    
    public function actionSelectThemes(){
        $this->render('select_themes', array('model' => $model));
    }

}