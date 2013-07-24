<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $model = new SpCompany();
        $model->unsetAttributes();

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionDetail($id = null) {
        $model = SpCompany::model()->find('id=:id', array(':id' => $id));

        $this->render('_detail', array(
            'model' => $model,
        ));
    }

    public function actionReadingPdf($id) {
        $model = SpCompany::model()->find('id=:id', array(':id' => $id));
        $path = './file/brochure/' . $model->brochure;
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $model->brochure . '";');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        Yii::app()->end();
    }

}