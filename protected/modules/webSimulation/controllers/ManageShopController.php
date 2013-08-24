<?php

class ManageShopController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'users' => array('@')
            ),
            array(
                'deny',
            ),
        );
    }

    //หน้า register
    public function actionRegister() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/shop_register.js');
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
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/select_themes.js');
        $shop_id = Yii::app()->session['shop_id'];
        $shop_format_id = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $shop_id))->web_shop_format_id;
        if ($shop_format_id == NULL) {
            $model = new WebShopFormat();
            $is_new = TRUE;
        } else {
            $model = WebShopFormat::model()->findByPk($shop_format_id);
        }
        if (isset($_POST['WebShopFormat'])) {
            $model->attributes = $_POST['WebShopFormat'];
            $model->web_shop_id = $shop_id;

            if ($model->theme != '') {
                $model->save();
                if ($is_new) {
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
        $shop_id = Yii::app()->session['shop_id'];
        $this->render('finish', array('shop_id' => $shop_id));
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
        $format = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $shop_id));
        if ($model->delete()) {
            if ($format->logo != NULL && file_exists($format->logo)) {
                unlink(Yii::app()->basePath . $format->logo);
            }
            if ($format->background != NULL && file_exists($format->background)) {
                unlink(Yii::app()->basePath . $format->background);
            }
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
        if ($shop_id != NULL) {
            $model = WebShop::model()->findByPk($shop_id);
            $this->render('manage_shop', array('model' => $model));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

//    หน้าจัดการรูปแบบร้านค้า
    public function actionManageShopFormat() {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            $model = WebShop::model()->findByPk($shop_id);
            $this->render('manage_shop_format', array('model' => $model));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

//    หน้าเลือกโลโก้ และพื้นหลัง
    public function actionSelectLogoBg() {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
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
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

//    หน้าเลือกอักษรและข้อความ
    public function actionSelectCharText() {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/select_text_color.js');
            $model = WebShopFormat::model()->findByAttributes(array('web_shop_id' => $shop_id));

            if (isset($_POST['WebShopFormat'])) {
                $model->attributes = $_POST['WebShopFormat'];
                if ($model->save()) {
                    echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopFormat')) . "';
                  </script>";
                }
            }
            $this->render('select_font', array('model' => $model));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

//    หน้าแสดงใบสั่งซื้อ
    public function actionOrder() {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            $model = new WebShopOrder();
            $model->web_shop_id = $shop_id;
            if (isset($_GET['WebShopOrder'])) {
                $model->attributes = $_GET['WebShopOrder'];
                $model->web_shop_id = $shop_id;
            }
            $this->render('order_list', array('model' => $model));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

//    หน้าแสดงรายละเอียดใบสั่งซื้อ
    public function actionOrderDetail($order_id) {
        $order = WebShopOrder::model()->findByPk($order_id);
        $item = new WebShopOrderDetail();
        $item->web_shop_order_id = $order_id;
        if (isset($_POST['status'])) {
            $model->attributes = $_POST['status'];
            WebShopOrder::model()->updateByPk($order_id, array('status' => $_POST['status']));
            $order->status = $_POST['status'];
        }
        $this->render('order_detail', array('order' => $order, 'item' => $item));
    }

    public function actionDeleteOrder($order_id) {
        $model = WebShopOrder::model()->findByPk($order_id);
        if ($model->delete()) {
            
        }
    }

//    หน้าจัดการสินค้า
    public function actionManageShopItem() {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            $this->render('manage_shop_item', array('shop_id' => $shop_id));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

//    หน้าเพิ่ม/แก้ไขรายละเอียดสินค้า
    public function actionEditItem($item_id = NULL) {
        $shop_id = Yii::app()->session['shop_id'];
        if ($item_id == NULL) {
            $model = new WebShopItem();
//            $model->web_shop_id = $shop_id;
        } else {
            $model = WebShopItem::model()->findByPk($item_id);
        }

        if (isset($_POST['WebShopItem'])) {
            $model->attributes = $_POST['WebShopItem'];
            $model->web_shop_id = $shop_id;

            //for upload pic
            if ($_POST['is_delete_pic_1']) {
                $model->pic_1 = NULL;
            } else {
                $model = UploadPic::upload($model, 'pic_1');
            }

            if ($_POST['is_delete_pic_2']) {
                $model->pic_2 = NULL;
            } else {
                $model = UploadPic::upload($model, 'pic_2');
            }

            if ($_POST['is_delete_pic_3']) {
                $model->pic_3 = NULL;
            } else {
                $model = UploadPic::upload($model, 'pic_3');
            }

            if ($_POST['is_delete_pic_4']) {
                $model->pic_4 = NULL;
            } else {
                $model = UploadPic::upload($model, 'pic_4');
            }

            if ($_POST['is_delete_pic_5']) {
                $model->pic_5 = NULL;
            } else {
                $model = UploadPic::upload($model, 'pic_5');
            }

            if ($_POST['is_delete_pic_6']) {
                $model->pic_6 = NULL;
            } else {
                $model = UploadPic::upload($model, 'pic_6');
            }

            if ($_POST['is_delete_pic_7']) {
                $model->pic_7 = NULL;
            } else {
                $model = UploadPic::upload($model, 'pic_7');
            }

            if ($_POST['is_delete_pic_8']) {
                $model->pic_8 = NULL;
            } else {
                $model = UploadPic::upload($model, 'pic_8');
            }
            //END for upload pic

            if ($model->save()) {
//                if ($item_id == NULL) {
//                    echo "<script language='javascript'>
//                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
//                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopItem')) . "';
//                  </script>";
//                } else {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageItem')) . "';
                  </script>";
//                }
            }
        }
        $this->render('edit_item', array('model' => $model));
    }

//    หน้า จัดการรายการสินค้า
    public function actionManageItem() {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            $model = new WebShopItem();
            $model->web_shop_id = $shop_id;
            if (isset($_GET['WebShopItem'])) {
                $model->attributes = $_GET['WebShopItem'];
                $model->web_shop_id = $shop_id;
            }
            $this->render('manage_item', array('model' => $model));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

    public function actionDeletePic($pic, $item_id) {
        $model = WebShopItem::model()->findByPk($item_id);
        $file = '.' . $model->$pic;
        if (file_exists($file) && $model->$pic != 'NULL') {
            unlink($file);
        }
        if (WebShopItem::model()->updateByPk($item_id, array($pic => NULL))) {
            $model->$pic = '';
            $this->renderPartial('item_pic_', array('model' => $model, 'pic' => $pic, 'is_delete' => '1'));
        }
    }

    public function actionDeleteItem($item_id) {
        $model = WebShopItem::model()->findByPk($item_id);
        if ($model->delete()) {
            
        }
    }

//    หน้าจัดการกล่องแสดงสินค้า
    public function actionManageBox() {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
//            Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/add_box.js');

            $this->render('manage_box', array('shop_id' => $shop_id));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

    public function actionAddBox($box_id = NULL) {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            if ($box_id == NULL) {
                $model = new WebShopBox();
            } else {
                $model = WebShopBox::model()->findByPk($box_id);
            }
            if (isset($_POST['WebShopBox'])) {
                $model->attributes = $_POST['WebShopBox'];
                $model->web_shop_id = $shop_id;
                $model->type = 1;

                if ($box_id == NULL) {
                    $criteria = new CDbCriteria;
                    $criteria->select = 'order_n';
                    $criteria->order = 'order_n desc';
                    $criteria->limit = '1';
                    if ($order = $model->model()->find($criteria)) {
                        $last = $order->order_n + 1;
                    } else {
                        $last = 1;
                    }
                    $model->order_n = $last;
                }
                $model->show_box = 1;

                if ($model->save()) {
                    echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                    window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageBox')) . "';
                  </script>";
                }
            }
//            $this->renderPartial('add_box_', array('model' => $model));
            $this->render('add_box_', array('model' => $model));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

    public function actionAddHtml($box_id = NULL) {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            if ($box_id == NULL) {
                $model = new WebShopBox();
            } else {
                $model = WebShopBox::model()->findByPk($box_id);
            }
            if (isset($_POST['WebShopBox'])) {
                $model->attributes = $_POST['WebShopBox'];
                $model->web_shop_id = $shop_id;
                $model->type = 2;

                if ($box_id == NULL) {
                    $criteria = new CDbCriteria;
                    $criteria->select = 'order_n';
                    $criteria->order = 'order_n desc';
                    $criteria->limit = '1';
                    if ($order = $model->model()->find($criteria)) {
                        $last = $order->order_n + 1;
                    } else {
                        $last = 1;
                    }
                    $model->order_n = $last;
                }
                $model->show_box = 1;

                if ($model->save()) {
                    echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                    window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageBox')) . "';
                  </script>";
                }
            }
//            $this->renderPartial('add_html_', array('model' => $model));
            $this->render('add_html_', array('model' => $model));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

    public function actionAddVideo($box_id = NULL) {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            if ($box_id == NULL) {
                $model = new WebShopBox();
            } else {
                $model = WebShopBox::model()->findByPk($box_id);
            }
            if (isset($_POST['WebShopBox'])) {
                $model->attributes = $_POST['WebShopBox'];
                $model->web_shop_id = $shop_id;
                $model->type = 3;

                if ($box_id == NULL) {
                    $criteria = new CDbCriteria;
                    $criteria->select = 'order_n';
                    $criteria->order = 'order_n desc';
                    $criteria->limit = '1';
                    if ($order = $model->model()->find($criteria)) {
                        $last = $order->order_n + 1;
                    } else {
                        $last = 1;
                    }
                    $model->order_n = $last;
                }
                $model->show_box = 1;

                if ($model->save()) {
                    echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                    window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageBox')) . "';
                  </script>";
                }
            }
//            $this->renderPartial('add_video_', array('model' => $model));
            $this->render('add_video_', array('model' => $model));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

    public function actionDeleteBox($box_id) {
        $model = WebShopBox::model()->findByPk($box_id);
        if ($model->delete()) {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/manageShop/manageBox')));
        }
    }

    public function actionSortBox() {
        $shop_id = Yii::app()->session['shop_id'];
//        Yii::app()->clientScript->registerCssFile('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
//        Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/jquery-1.9.1.js');
//        Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/ui/1.10.3/jquery-ui.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/sort_box.js');
        if ($_POST['sort_arr'] != '') {
            $i = 1;
            $arr = array();
            $arr = preg_split('/,/', $_POST['sort_arr']);
            foreach ($arr as $box_id) {
                WebShopBox::model()->updateByPk($box_id, array('order_n' => $i));
                $i += 1;
            }
        }
        $this->render('sort_box', array('shop_id' => $shop_id));
    }

    public function actionEditBox($box_id) {
        $shop_id = Yii::app()->session['shop_id'];
//        Yii::app()->clientScript->registerCssFile('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
//        Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/jquery-1.9.1.js');
//        Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/ui/1.10.3/jquery-ui.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/edit_item_in_box.js');

        if (isset($_POST['select'])) {
            WebShopBoxItem::model()->deleteAll('web_shop_box_id = ' . $box_id);
            if ($_POST['select'] != '') {
                $arr = array();
                $arr = preg_split('/,/', $_POST['select']);
                foreach ($arr as $item_id) {
                    $model = new WebShopBoxItem();
                    $model->web_shop_id = $shop_id;
                    $model->web_shop_box_id = $box_id;
                    $model->web_shop_item_id = $item_id;
                    $model->save();
                }
            }
        }
        $this->render('edit_box', array('box_id' => $box_id, 'shop_id' => $shop_id));
    }

    public function actionShowBox($box_id, $is_show) {
        $this->render('blank');
        if ($is_show) {
            //เปลี่ยนเป็นซ่อน
            WebShopBox::model()->updateByPk($box_id, array('show_box' => '0'));
            echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'ซ่อนกล่องแสดงสินค้า') . Yii::t('language', 'เรียบร้อย') . "');
                    window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageBox')) . "';
                  </script>";
        } else {
            //เปลี่ยนเป็นโชว์
            WebShopBox::model()->updateByPk($box_id, array('show_box' => '1'));
            echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'แสดงกล่องแสดงสินค้า') . Yii::t('language', 'เรียบร้อย') . "');
                    window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageBox')) . "';
                  </script>";
        }
    }

//    หน้าจัดหมวดหมู่
    public function actionManageCategory() {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            $this->render('manage_category', array('shop_id' => $shop_id));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

    public function actionAddCategory($category_id = NULL) {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            if ($category_id == NULL) {
                $model = new WebShopCategory();
            } else {
                $model = WebShopCategory::model()->findByPk($category_id);
            }
            if (isset($_POST['WebShopCategory'])) {
                $model->attributes = $_POST['WebShopCategory'];
                $model->web_shop_id = $shop_id;

                if ($box_id == NULL) {
                    $criteria = new CDbCriteria;
                    $criteria->select = 'order_n';
                    $criteria->order = 'order_n desc';
                    $criteria->limit = '1';
                    if ($order = $model->model()->find($criteria)) {
                        $last = $order->order_n + 1;
                    } else {
                        $last = 1;
                    }
                    $model->order_n = $last;
                }
                $model->show_box = 1;

                if ($model->save()) {
                    echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                    window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageCategory')) . "';
                  </script>";
                }
            }
            $this->render('add_category', array('model' => $model));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

    public function actionEditCategory($category_id = NULL) {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
//        Yii::app()->clientScript->registerCssFile('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
//        Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/jquery-1.9.1.js');
//        Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/ui/1.10.3/jquery-ui.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/edit_item_in_box.js');

            if (isset($_POST['select'])) {
                WebShopCategoryItem::model()->deleteAll('web_shop_category_id = ' . $category_id);
                if ($_POST['select'] != '') {
                    $arr = array();
                    $arr = preg_split('/,/', $_POST['select']);
                    foreach ($arr as $item_id) {
                        $model = new WebShopCategoryItem();
                        $model->web_shop_id = $shop_id;
                        $model->web_shop_category_id = $category_id;
                        $model->web_shop_item_id = $item_id;
                        $model->save();
                    }
                }
            }
            $this->render('edit_category', array('category_id' => $category_id, 'shop_id' => $shop_id));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

    public function actionShowCategory($category_id, $is_show) {
        $this->render('blank');
        if ($is_show) {
            //เปลี่ยนเป็นซ่อน
            WebShopCategory::model()->updateByPk($category_id, array('show_box' => '0'));
            echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'ซ่อนหมวดหมู่สินค้า') . Yii::t('language', 'เรียบร้อย') . "');
                    window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageCategory')) . "';
                  </script>";
        } else {
            //เปลี่ยนเป็นโชว์
            WebShopCategory::model()->updateByPk($category_id, array('show_box' => '1'));
            echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'แสดงหมวดหมู่สินค้า') . Yii::t('language', 'เรียบร้อย') . "');
                    window.top.location.href = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageCategory')) . "';
                  </script>";
        }
    }

    public function actionDeleteCategory($category_id) {
        $model = WebShopCategory::model()->findByPk($category_id);
        if ($model->delete()) {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/manageShop/manageCategory')));
        }
    }

    public function actionEditHowToBuy() {
        $shop_id = Yii::app()->session['shop_id'];
        if ($shop_id != NULL) {
            $model = WebShop::model()->findByPk($shop_id);
            if (isset($_POST['WebShop'])) {
                $model->attributes = $_POST['WebShop'];
                WebShop::model()->updateByPk($shop_id, array('how_to_buy_th' => $model->how_to_buy_th, 'how_to_buy_en' => $model->how_to_buy_en));
                echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.top.location.href = '/webSimulation/manageShop/manageShop';
                </script>";
            }
            $this->render('edit_how_to_buy', array('model' => $model, 'shop_id' => $shop_id));
        } else {
            $this->redirect(CHtml::normalizeUrl(array('/webSimulation/default/index')));
        }
    }

}
