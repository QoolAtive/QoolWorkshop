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

            if ($model->save()) {
                $this->redirect(CHtml::normalizeUrl(array('/news/manage/index')));
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
    
    public function actionManageGroup(){
        
    }

}