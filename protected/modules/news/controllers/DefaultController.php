<?php

class DefaultController extends Controller {

    public function actionIndex($view = NULL) {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/news/regist_news_email.js');
        $criteria = new CDbCriteria();
        $count = News::model()->count($criteria);
        $pages_news = new CPagination($count);
        // results per page
        $pages_news->pageSize = 15;
        $pages_news->applyLimit($criteria);
        $newslist = News::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $count = Training::model()->count($criteria);
        $pages_train = new CPagination($count);
        // results per page
        $pages_train->pageSize = 15;
        $pages_train->applyLimit($criteria);
        $trainlist = Training::model()->findAll();

        $this->render('index', array(
            'newslist' => $newslist,
            'trainlist' => $trainlist,
            'pages_news' => $pages_news,
            'pages_train' => $pages_train,
            'view' => $view,
        ));
    }

    public function actionRegistNewsEmail() {
        $model = new NewsMail();
        if (isset($_POST['NewsMail'])) {
            $model->attributes = $_POST['NewsMail'];
            if ($model->save()) {
                echo "<script language='javascript'>
                alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                window.top.location.href = '" . CHtml::normalizeUrl(array('/news/default/index/view/1')) . "';
                </script>";
            } else {
                echo "<script language='javascript'>
                alert('" . Yii::t('language', 'อีเมล์ไม่ถูกต้อง') . "');
                window.top.location.href = '" . CHtml::normalizeUrl(array('/news/default/index/view/1')) . "';
                </script>";
            }
        }
        $this->renderPartial('regist_news_email_', array(
            'model' => $model
        ));
    }

}