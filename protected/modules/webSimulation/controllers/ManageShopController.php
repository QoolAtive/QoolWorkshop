<?php

class ManageShopController extends Controller {

    public function actionIndex() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/change_district.js');
        $model = new WebShop();
        if (isset($_POST['WebShop'])) {
            $model->attributes = $_POST['WebShop'];
            $model->theme = 'tamp';
            $model->mem_user_id = Yii::app()->user->id;
            $model->creat_at = date("Y-m-d H:i:s");
            if ($model->save()) {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes/id/' . $model->getPrimaryKey())) . "';
                  </script>";
            }
        }
        $this->render('index', array('model' => $model));
    }

    public function actionSelectThemes($id) {
        $model = WebShop::model()->findByPk($id);
        if (isset($_POST['WebShop'])) {
            $model->theme = $_POST['WebShop']->theme;
            echo $model->theme;
//            if ($model->validate()) {
//                
//            }
        }
        $this->render('select_themes', array('model' => $model));
    }

    public function actionFinish() {
        $this->render('finish', array('model' => $model));
    }

}