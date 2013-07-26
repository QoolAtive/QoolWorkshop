<?php

class DefaultController extends Controller {

    public function actionIndex($id = null) {
        $model = new SpCompany();
        $model->unsetAttributes();

        if ($id == null) {
            $id_array = array();
            $list_data = SpTypeBusiness::model()->findAll();
            foreach ($list_data as $data) {
                array_push($id_array, $data['id']);
            }
            $id = $id_array[0];
        }
        $model_type = SpTypeBusiness::model()->find('id=:id', array(':id' => $id));

        $this->render('index', array(
            'model' => $model,
            'model_type' => $model_type,
            'id' => $id,
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