<?php

class ManageShopController extends Controller {

    //หน้า register
    public function actionIndex() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/shop_register.js');
        $model = new WebShop();
        if (isset($_POST['WebShop'])) {
            $model->attributes = $_POST['WebShop'];
            //url ที่อยู่ร้านค้า
            $model->url = CHtml::normalizeUrl(array('/webSimulation/shop/index/id/' . $model->getPrimaryKey()));
            //สร้าง temp ไว้ไม่ให้เป็น NULL ให้ขั้นตอนเลือก theme ถัดไป
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
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/select_themes.js');
        $model = WebShop::model()->findByPk($id);
        if (isset($_POST['WebShop'])) {
            $model->theme = $_POST['WebShop']['theme'];
            if ($model->theme != '') {
                WebShop::model()->updateByPk($id, array('theme' => $model->theme));
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/finish')) . "';
                  </script>";
            } else {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'กรุณาเลือกธีมที่ต้องการ') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes/id/' . $id)) . "';
                  </script>";
            }
        }
        $this->render('select_themes', array('model' => $model));
    }

    public function actionFinish() {
        $this->render('finish');
    }

    public function actionManageShopList() {
        $model = new WebShop();
        if (isset($_GET['WebShop'])) {
            $model->attributes = $_GET['WebShop'];
        }
        $this->render('manage_shop_list', array('model' => $model));
    }

    public function actionManageShop($id) {
        $model = WebShop::model()->findByPk($id);
        $this->render('manage', array('model' => $model));
    }

}
