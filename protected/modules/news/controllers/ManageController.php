<?php

class ManageController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'users' => array('admin')
            ),
            array(
                'deny',
            ),
        );
    }

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
//for upload news file
                $arr_news_files = CUploadedFile::getInstancesByName('file_path');
                if ($arr_news_files != NULL) {
                    $news_path = '/upload/file/news/';

                    foreach ($arr_news_files as $news_i => $news_file) {
                        $model_news_file = new NewsFile;
                        $model_news_file->news_id = $model->id;
                        $arr_news_file_detail = explode('.', $news_file->getName());
                        $news_formatName = $arr_news_file_detail[0] . "-" . time() . $news_i . '.' . $news_file->getExtensionName();
                        $news_file->saveAs('.' . $news_path . $news_formatName);
                        $model_news_file->file_name = $arr_news_file_detail[0] . '.' . $news_file->getExtensionName();
                        $model_news_file->file_path = $news_path . $news_formatName;
                        $model_news_file->save();
                    }
                }
//END for upload news file

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
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/web_sim/select_text_color.js');
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

    public function actionSendNewsMail($news_id) {
        if ($news_id !== NULL) {
            $this->render('send_mail');
            $news = News::model()->findByPk($news_id);
            $email_list = NewsMail::model()->findAll();

            // Add By Ann 23-08-56 For AddAttachment in E-mail
            $data['news_id'] = $news_id;

            $data['from'] = 'dbdmart2013@gmail.com';
            $data['name'] = Yii::t('language', 'ข่าวสารจาก DBD Mart');
            $data['subject'] = $news['subject_th'];
            $data['message'] = $news['detail_th'];
            $counter = 0;
            foreach ($email_list as $email) {
                $data['to'] = $email['email'];
                if (Tool::sendNewsMail($data)) {
                    $counter += 1;
                }
            }

            if ($counter > 0) {
                echo "<script>
                        alert('" . Yii::t('language', 'ส่งอีเมล์เป็นจำนวน') . ' ' . $counter . ' ' . Yii::t('language', 'ฉบับ') . "');
                        window.close();
                    </script>";
            } else {
                echo "<script>
                        alert('" . Yii::t('language', 'เกิดข้อผิดพลาดขณะส่งข้อมูล') . "');
                        window.close();
                    </script>";
            }
        }
    }

    public function actionManageEmail() {
        $model = new NewsMail();
        if (isset($_GET['NewsMail'])) {
            $model->attributes = $_GET['NewsMail'];
        }
        $this->render('manage_email', array(
            'model' => $model,
        ));
    }

    public function actionDeleteEmail($email) {
        $model = NewsMail::model()->findByAttributes(array('email' => $email));
        if ($model->delete()) {
//            $this->redirect("/faq/default/manageFaq");
        }
    }

    public function actionEditEmail($email_id = NULL) {
        if ($email_id == NULL) {
            $model = new NewsMail();
        } else {
            $model = NewsMail::model()->findByPk($email_id);
        }
        if (isset($_POST['NewsMail'])) {
            $model->attributes = $_POST['NewsMail'];
            if ($model->save()) {
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.top.location.href = '" . CHtml::normalizeUrl(array('/news/manage/manageEmail')) . "';
                  </script>";
            }
        }
        $this->render('edit_email', array(
            'model' => $model,
        ));
    }

}