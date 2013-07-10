<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $criteria->condition = "fm_id = '1'";
        $count = FaqQuestion::model()->count($criteria);
        $pages1 = new CPagination($count);
        // results per page
        $pages1->pageSize = 15;
        $pages1->applyLimit($criteria);
        $faq1 = FaqQuestion::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->condition = "fm_id = '2'";
        $count = FaqQuestion::model()->count($criteria);
        $pages2 = new CPagination($count);
        // results per page
        $pages2->pageSize = 15;
        $pages2->applyLimit($criteria);
        $faq2 = FaqQuestion::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->condition = "fm_id = '3'";
        $count = FaqQuestion::model()->count($criteria);
        $pages3 = new CPagination($count);
        // results per page
        $pages3->pageSize = 15;
        $pages3->applyLimit($criteria);
        $faq3 = FaqQuestion::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->condition = "fm_id = '4'";
        $count = FaqQuestion::model()->count($criteria);
        $pages4 = new CPagination($count);
        // results per page
        $pages4->pageSize = 15;
        $pages4->applyLimit($criteria);
        $faq4 = FaqQuestion::model()->findAll($criteria);

        $this->render('index', array(
            'faq1' => $faq1,
            'faq2' => $faq2,
            'faq3' => $faq3,
            'faq4' => $faq4,
            'pages1' => $pages1,
            'pages2' => $pages2,
            'pages3' => $pages3,
            'pages4' => $pages4,
        ));
    }

    public function actionEditFaq($id = NULL, $fm_id = NULL) {
        if ($id == NULL) {
            $model = new FaqQuestion();
            $model->fm_id = $fm_id;
        } else {
            $model = FaqQuestion::model()->findByPk($id);
        }

        if (isset($_POST['FaqQuestion'])) {
            $model->attributes = $_POST['FaqQuestion'];
            $model->author = Yii::app()->user->id;
            $model->date_write = date("Y-m-d H:i:s");

            if ($model->save()) {
                $this->redirect(CHtml::normalizeUrl(array('/faq/default/manageFaq#view' . $fm_id)));
            }
        }
        $this->render('editfaq', array('model' => $model));
    }

    public function actionDeleteFaq($id) {
        $model = FaqQuestion::model()->findByPk($id);
        if ($model->delete()) {
//            $this->redirect("/faq/default/manageFaq");
        }
    }

    public function actionManageFaq() {
        $model = new FaqQuestion();
        if (isset($_GET['FaqQuestion'])) {
            $model->attributes = $_GET['FaqQuestion'];
        }
        $this->render('managefaq', array(
            'model' => $model,
        ));
    }

}