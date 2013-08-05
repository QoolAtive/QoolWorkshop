<?php

class ManageShopController extends Controller {

    //หน้า register
    public function actionRegister($shop_id = NULL) {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/shop_register.js');
        if ($shop_id == NULL) {
            $model = new WebShop();
        } else {
            $model = WebShop::model()->findByPk($shop_id);
        }

        if (isset($_POST['WebShop'])) {
            $model->attributes = $_POST['WebShop'];
            //url ที่อยู่ร้านค้า
            $model->url = CHtml::normalizeUrl(array('/webSimulation/shop/index/id/' . $model->getPrimaryKey()));
            //สร้าง temp ไว้ไม่ให้เป็น NULL ให้ขั้นตอนเลือก theme ถัดไป
            $model->theme = 'tamp';
            $model->mem_user_id = Yii::app()->user->id;
            $model->creat_at = date("Y-m-d H:i:s");
            if ($model->save()) {
                if ($shop_id == NULL) {
                    echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes/id/' . $model->getPrimaryKey())) . "';
                  </script>";
                } else {
                    echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopList')) . "';
                  </script>";
                }
            }
        }
        $this->render('register', array('model' => $model));
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
        $user_id = Yii::app()->user->id;
        $model = new WebShop();
        if (isset($_GET['WebShop'])) {
            $model->attributes = $_GET['WebShop'];
        }
        $this->render('manage_shop_list', array('model' => $model, 'user_id' => $user_id));
    }

    public function actionManageShop($shop_id) {
        $model = WebShop::model()->findByPk($shop_id);
        $this->render('manage_shop', array('model' => $model, 'shop_id' => $shop_id));
    }

    public function actionManageItem($shop_id) {
        $model = WebShop::model()->findByPk($shop_id);
        $this->render('manage_shop', array('model' => $model, 'shop_id' => $shop_id));
    }

    public function actionDeleteShop($shop_id) {
        $model = WebShop::model()->findByPk($shop_id);
        if ($model->delete()) {
//            $this->redirect("/faq/default/manageFaq");
        }
    }

}
