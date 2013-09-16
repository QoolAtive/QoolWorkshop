<?php

class ManageController extends Controller {

    public function filters() {
        return array(
            'rights'
        );
    }

//    public function accessRules() {
//        return array(
//            array(
//                'allow',
//                'users' => array('admin')
//            ),
//            array(
//                'deny',
//            ),
//        );
//    }
//fm_id = main_id
    public function actionEditFaq($fm_id, $id = NULL) {
        if ($id == NULL) {
            $model = new FaqQuestion();
            $model->fm_id = $fm_id;
//            $model->fs_id = $fs_id;
            $model->counter = 0;
        } else {
            $model = FaqQuestion::model()->findByPk($id);
        }

        if (isset($_POST['FaqQuestion'])) {
            $model->attributes = $_POST['FaqQuestion'];
            $model->author = Yii::app()->user->id;
            $model->date_write = date("Y-m-d H:i:s");
            if ($model->save()) {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/faq/manage/manageFaq', 'main_id' => $fm_id)) . "';
                  </script>";
            }
        }
        $this->render('editfaq', array(
            'model' => $model,
            'fm_id' => $fm_id,
//            'fs_id' => $fs_id
        ));
    }

    public function actionDeleteFaq($id) {
        $model = FaqQuestion::model()->findByPk($id);
        if ($model->delete()) {
//            $this->redirect("/faq/default/manageFaq");
        }
    }
    
    public function actionManageFaq($main_id) {
        $model = new FaqQuestion();
        if (isset($_GET['FaqQuestion'])) {
            $model->attributes = $_GET['FaqQuestion'];
        }
        $this->render('managefaq', array(
            'model' => $model,
            'main_id' => $main_id,
        ));
    }

    //manage category
    public function actionManageCategory(){
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/faq/tag_url.js');
        $model_main = new FaqMain();
        if (isset($_GET['FaqMain'])) {
            $model_main->attributes = $_GET['FaqMain'];
        }
        
        $model_sub = new FaqSub();
        if (isset($_GET['FaqSub'])) {
            $model_sub->attributes = $_GET['FaqSub'];
        }
        $this->render('manage_category', array('model_main' => $model_main, 'model_sub' => $model_sub));
    }

    //main faq
    public function actionManageMain() {
        $model = new FaqMain();
        if (isset($_GET['FaqMain'])) {
            $model->attributes = $_GET['FaqMain'];
        }
        $this->render('manage_main', array('model' => $model));
    }

    public function actionEditMain($faq_main_id = NULL) {
        if ($faq_main_id == NULL) {
            $model = new FaqMain();
        } else {
            $model = FaqMain::model()->findByPk($faq_main_id);
        }
        if (isset($_POST['FaqMain'])) {
            $model->attributes = $_POST['FaqMain'];

            if ($model->order_n == NULL) {
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

            if ($model->save()) {
                echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.top.location.href = '/faq/manage/manageCategory';
                </script>";
            }
        }
        $this->render('edit_main', array('model' => $model));
    }

    public function actionDeleteMain($faq_main_id) {
        $model = FaqMain::model()->findByPk($faq_main_id);
        if ($model->delete()) {
            
        }
    }

    //sub faq
    public function actionManageSub() {
//        $have_main_id = FaqMain::model()->findByPk($main_id);
//        if (isset($have_main_id)) {
            $model = new FaqSub();
//            $model->faq_main_id = $main_id;
            if (isset($_GET['FaqSub'])) {
                $model->attributes = $_GET['FaqSub'];
            }
            $this->render('manage_sub', array('model' => $model));
//        } else {
//            $this->redirect(CHtml::normalizeUrl(array('/faq/manage/manageMain')));
//        }
    }

    public function actionEditSub($faq_sub_id = NULL) {
        if ($faq_sub_id == NULL) {
            $model = new FaqSub();
        } else {
            $model = FaqSub::model()->findByPk($faq_sub_id);
        }
        if (isset($_POST['FaqSub'])) {
            $model->attributes = $_POST['FaqSub'];
//            $model->faq_main_id = $main_id;

            if ($model->order_n == NULL) {
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

            if ($model->save()) {
                echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.top.location.href = '/faq/manage/manageCategory/#sub';
                </script>";
            }
        }
        $this->render('edit_sub', array('model' => $model));
    }

    public function actionDeleteSub($faq_sub_id) {
        $model = FaqSub::model()->findByPk($faq_sub_id);
        if ($model->delete()) {
            
        }
    }

    //เรียงลำดับหมวดหมู่
    public function actionSortMain() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/sort_box.js');
        if ($_POST['sort_arr'] != '') {
            $i = 1;
            $arr = array();
            $arr = preg_split('/,/', $_POST['sort_arr']);
            foreach ($arr as $id) {
                FaqMain::model()->updateByPk($id, array('order_n' => $i));
                $i += 1;
            }
            echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                    window.top.location.href = '/faq/manage/manageCategory';
                </script>";
        }
        $this->render('sort_main');
    }

    public function actionSortSub($main_id) {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/sort_box.js');
        if ($_POST['sort_arr'] != '') {
            $i = 1;
            $arr = array();
            $arr = preg_split('/,/', $_POST['sort_arr']);
            foreach ($arr as $id) {
                FaqSub::model()->updateByPk($id, array('order_n' => $i));
                $i += 1;
            }
            echo "<script language='javascript'>
                    alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                    window.top.location.href = '/faq/manage/indexSortSub';
                </script>";
        }
        $this->render('sort_sub', array('main_id' => $main_id));
    }
    
    public function actionIndexSortSub(){
        $model = FaqMain::model()->findAll(array('order' => 'order_n'));
        $this->render('index_sort_sub', array('model' => $model));
    }

}