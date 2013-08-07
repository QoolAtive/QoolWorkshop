<?php

class ManageShopController extends Controller {

    //หน้า register
    public function actionRegister() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/shop_register.js');
        $shop_id == NULL;
        $shop_id = Yii::app()->session['shop_id'];
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
                    Yii::app()->session['shop_id'] = $model->getPrimaryKey();
                    echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes')) . "';
                  </script>";
                } else {
                    //หน้าแก้ไข
                    echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShop')) . "';
                  </script>";
                }
            }
        }
        $this->render('register', array('model' => $model));
    }

//    หน้าเลือกธีม
    public function actionSelectThemes() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/select_themes.js');
        $shop_id = Yii::app()->session['shop_id'];
        $shop_format_id = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $shop_id))->web_shop_format_id;
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
                if ($shop_id == NULL) {
                    //หน้าสมัคร
                    echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/finish')) . "';
                  </script>";
                } else {
                    //หน้าแก้ไข
                    echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopFormat')) . "';
                  </script>";
                }
            } else {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'กรุณาเลือกธีมที่ต้องการ') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes')) . "';
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
        unset(Yii::app()->session['shop_id']);
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

//    set session
    public function actionRedirectManageShop($shop_id) {
        Yii::app()->session['shop_id'] = $shop_id;
        $this->redirect(CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShop')));
    }

//    หน้าจัดการร้านค้า
    public function actionManageShop() {
        $shop_id = Yii::app()->session['shop_id'];
        $model = WebShop::model()->findByPk($shop_id);
        $this->render('manage_shop', array('model' => $model));
    }

//    หน้าจัดการสินค้า
    public function actionManageShopItem() {
        $shop_id = Yii::app()->session['shop_id'];
        $model = WebShop::model()->findByPk($shop_id);
        $this->render('manage_item', array('model' => $model));
    }

//    หน้าจัดการรูปแบบร้านค้า
    public function actionManageShopFormat() {
        $shop_id = Yii::app()->session['shop_id'];
        $model = WebShop::model()->findByPk($shop_id);
        $this->render('manage_shop_format', array('model' => $model));
    }

//    หน้าเลือกโลโก้ และพื้นหลัง
    public function actionSelectLogoBg() {
        $shop_id = Yii::app()->session['shop_id'];
        $model = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $shop_id));

        if (isset($_POST['WebShopFormat'])) {
            $model->attributes = $_POST['WebShopFormat'];

            //for upload logo pic
            $arr_files = CUploadedFile::getInstancesByName('logo_file');
            if ($arr_files != NULL) {
                $path = '/upload/img/websim/logo/';

                foreach ($arr_files as $i => $file) {
                    $arr_file_detail = explode('.', $file->getName());
                    $formatName = $arr_file_detail[0] . "-" . time() . $i . '.' . $file->getExtensionName();
                    $file->saveAs('.' . $path . $formatName);
                    $model->logo = $path . $formatName;
                }
//            } else if ($model->img_path == NULL) {
//                $model->img_path = '/img/link/Link_icon.png';
            }
            //END for upload logo pic
            //
            //for upload bg pic
            $arr_files = CUploadedFile::getInstancesByName('bg_file');
            if ($arr_files != NULL) {
                $path = '/upload/img/websim/bg/';

                foreach ($arr_files as $i => $file) {
                    $arr_file_detail = explode('.', $file->getName());
                    $formatName = $arr_file_detail[0] . "-" . time() . $i . '.' . $file->getExtensionName();
                    $file->saveAs('.' . $path . $formatName);
                    $model->background = $path . $formatName;
                }
//            } else if ($model->img_path == NULL) {
//                $model->img_path = '/img/link/Link_icon.png';
            }
            //END for upload bg pic

            $valid_logo = FALSE;
            $valid_bg = FALSE;
            if ($model->logo != NULL || $model->background != NULL) {
                if ($model->logo != NULL) {
                    $valid_logo = WebShopFormat::model()->updateByPk($model->web_shop_format_id, array('logo' => $model->logo));
                }
                if ($model->background != NULL) {
                    $valid_bg = WebShopFormat::model()->updateByPk($model->web_shop_format_id, array('background' => $model->background));
                }
            } else {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'กรุณาเลือกโลโก้หรือพื้นหลังที่ต้องการ') . "');
                  </script>";
            }

            if ($valid_logo || $valid_bg) {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopFormat')) . "';
                  </script>";
            }
        }
        $this->render('select_logo_bg', array('model' => $model));
    }
    
    public function actionSelectCharText(){
        $shop_id = Yii::app()->session['shop_id'];
        $model = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $shop_id));
        
        if (isset($_POST['WebShopFormat'])) {
            $model->attributes = $_POST['WebShopFormat'];
            if($model->save()){
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopFormat')) . "';
                  </script>";
            }
        }
        $this->render('select_font', array('model' => $model));
    }

}
