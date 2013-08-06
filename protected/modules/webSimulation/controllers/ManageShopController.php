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
            $model->mem_user_id = Yii::app()->user->id;
            $model->url = 'temp';
            $model->creat_at = date("Y-m-d H:i:s");
            if ($model->save()) {
                //url ที่อยู่ร้านค้า
                $url = $this->createAbsoluteUrl('/webSimulation/shop/index/id/' . $model->getPrimaryKey());
                WebShop::model()->updateByPk($model->getPrimaryKey(), array('url' => $url));
                
                if ($shop_id == NULL) {
                    echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes/shop_id/' . $model->getPrimaryKey())) . "';
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

//    หน้าเลือกธีม
    public function actionSelectThemes($shop_id, $shop_format_id = NULL) {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/select_themes.js');
        if ($shop_format_id == NULL) {
            $model = new WebShopFormat();
        } else {
            $model = WebShopFormat::model()->findByPk($shop_format_id);
        }
        if (isset($_POST['WebShopFormat'])) {
            $model->attributes = $_POST['WebShopFormat'];
            $model->web_shop_id = $shop_id;

            if ($model->theme != '') {
                $model->save();
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/finish')) . "';
                  </script>";
            } else {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'กรุณาเลือกธีมที่ต้องการ') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes/shop_id/' . $shop_id)) . "';
                  </script>";
            }
        }
        $this->render('select_themes', array('model' => $model));
    }

//    หน้าสิ้นสุดการสร้างร้านค้า
    public function actionFinish() {
        $this->render('finish');
    }

//    หน้าจัดการรายการร้านค้า
    public function actionManageShopList() {
        $user_id = Yii::app()->user->id;
        $model = new WebShop();
        if (isset($_GET['WebShop'])) {
            $model->attributes = $_GET['WebShop'];
        }
        $this->render('manage_shop_list', array('model' => $model, 'user_id' => $user_id));
    }

    public function actionDeleteShop($shop_id) {
        $model = WebShop::model()->findByPk($shop_id);
        if ($model->delete()) {
            
        }
    }

//    หน้าจัดการร้านค้า
    public function actionManageShop($shop_id) {
        $model = WebShop::model()->findByPk($shop_id);
        $this->render('manage_shop', array('model' => $model, 'shop_id' => $shop_id));
    }

//    หน้าจัดการสินค้า
    public function actionManageShopItem($shop_id) {
        $model = WebShop::model()->findByPk($shop_id);
        $this->render('manage_shop', array('model' => $model, 'shop_id' => $shop_id));
    }

    public function actionManageShopFormat() {
        $model = WebShop::model()->findByPk($shop_id);
        $this->render('manage_shop', array('model' => $model, 'shop_id' => $shop_id));
    }

}
