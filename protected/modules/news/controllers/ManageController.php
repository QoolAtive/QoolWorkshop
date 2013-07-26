<?php

class ManageController extends Controller {

    public function actionIndex() {
        $model = new News();
        if (isset($_GET['News'])) {
            $model->attributes = $_GET['News'];
        }
        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionEdit($id = NULL) {
        if ($id == NULL) {
            $model = new News();
        } else {
            $model = News::model()->findByPk($id);
        }

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            $model->author = Yii::app()->user->id;
            $model->date_write = date("Y-m-d H:i:s");

            //for upload pic
            $arr_files = CUploadedFile::getInstancesByName('link_file');
            if ($arr_files != NULL) {
                $path = '/upload/img/news/';

                foreach ($arr_files as $i => $file) {
                    $arr_file_detail = explode('.', $file->getName());
                    $formatName = $arr_file_detail[0] . "-" . time() . $i . '.' . $file->getExtensionName();
                    $file->saveAs('.' . $path . $formatName);
                    $model->pic = $path . $formatName;
                }
//            } else if ($model->img_path == NULL) {
//                $model->img_path = '/img/link/Link_icon.png';
            }
            //END for upload pic

            if ($model->save()) {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/news/manage/index')) . "';
                  </script>";
            }
        }
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id) {
        $model = News::model()->findByPk($id);
        if ($model->delete()) {
//            $this->redirect("/faq/default/manageFaq");
        }
    }

    public function actionManageGroup() {
        $model = new NewsGroup();
        if (isset($_GET['NewsGroup'])) {
            $model->attributes = $_GET['NewsGroup'];
        }
        $this->render('manage_group', array(
            'model' => $model,
        ));
    }

    public function actionEditGroup($id = NULL) {
        if ($id == NULL) {
            $model = new NewsGroup();
        } else {
            $model = NewsGroup::model()->findByPk($id);
        }
        if (isset($_POST['NewsGroup'])) {
            $model->attributes = $_POST['NewsGroup'];
            if ($model->save()) {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/news/manage/manageGroup')) . "';
                  </script>";
            }
        }
        $this->render('edit_group', array(
            'model' => $model,
        ));
    }

    public function actionDeleteGroup($id) {
        $model = NewsGroup::model()->findByPk($id);
        if ($model->delete()) {
//            $this->redirect("/faq/default/manageFaq");
        }
    }

    public function actionManageTraining() {
        $model = new Training();
        if (isset($_GET['Training'])) {
            $model->attributes = $_GET['Training'];
        }
        $this->render('manage_training', array(
            'model' => $model,
        ));
    }

    public function actionEditTraining($id = NULL) {
        if ($id == NULL) {
            $model = new Training();
        } else {
            $model = Training::model()->findByPk($id);
        }
        if (isset($_POST['Training'])) {
            $model->attributes = $_POST['Training'];
            if (!preg_match("~^(?:f|ht)tps?://~i", $model->link)) {
                $model->link = 'http://' . $model->link;
            }
            if ($model->save()) {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/news/manage/manageTraining')) . "';
                  </script>";
            }
        }
        $this->render('edit_training', array(
            'model' => $model,
        ));
    }

    public function actionDeleteTraining($id) {
        $model = Training::model()->findByPk($id);
        if ($model->delete()) {
//            $this->redirect("/faq/default/manageFaq");
        }
    }

    public function actionEditRss($id = NULL) {
        if ($id == NULL) {
            $model = new NewsRss();
        } else {
            $model = NewsRss::model()->findByPk($id);
        }
        if (isset($_POST['NewsRss'])) {
            $model->attributes = $_POST['NewsRss'];
            if ($model->save()) {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/news/default/index')) . "';
                  </script>";
            }
        }
        $this->render('edit_rss', array(
            'model' => $model,
        ));
    }

}