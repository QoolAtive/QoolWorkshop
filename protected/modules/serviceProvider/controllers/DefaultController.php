<?php

class DefaultController extends Controller {

    public function actionIndex($id = null) {
        $link = new CHttpRequest();
        Yii::app()->user->setState('default_link_back_to_menu', '');
        Yii::app()->user->setState('default_link_back_to_menu', str_replace('/index.php', '', $link->getUrl()));

//        echo $link->getUrl();

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

    public function actionDetail($id = null, $type = null) {
        $link = new CHttpRequest();
        Yii::app()->user->setState('default_link_back_to_menu', '');
        Yii::app()->user->setState('default_link_back_to_menu', str_replace('/index.php', '', $link->getUrl()));

        $count_company_view = SpCountComanyView::model()->count('sp_company_id=:sp_company_id', array(':sp_company_id' => $id));
        if ($count_company_view < 1) {
            $model_count = new SpCountComanyView();
            $model_count->sp_company_id = $id;
            $model_count->count_company_view = 1;
            $model_count->update_at = date("Y-m-d H:i:s");
            if ($model_count->save()) {
                
            } else {
                echo "<pre>";
                print_r($model_count->getErrors());
                echo "</pre>";
            }
        } else {
            $model_count = SpCountComanyView::model()->find('sp_company_id=:sp_company_id', array(':sp_company_id' => $id));
            $model_count->count_company_view = $model_count->count_company_view + 1;
            $model_count->update_at = date("Y-m-d H:i:s");
            $model_count->save();
        }

        $model = SpCompany::model()->find('id=:id', array(':id' => $id));

        $this->render('_detail', array(
            'model' => $model,
            'model_count' => $model_count,
            'type_business_back' => $type,
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