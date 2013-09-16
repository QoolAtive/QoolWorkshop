<?php

class DefaultController extends Controller {

    public function actionIndex($main_id = NULL) {
        if ($main_id == NULL) {
            $criteria = new CDbCriteria;
            $criteria->select = 'id';
            $criteria->order = 'order_n';
            $criteria->limit = '1';
            $main_id_model = FaqMain::model()->find($criteria);
            $main_id = $main_id_model->id;
        }
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/self/faq/count_view_faq.js');
        $criteria = new CDbCriteria();
        $criteria->condition = "fm_id = " . $main_id;
        $criteria->order = "counter desc";
        $count = FaqQuestion::model()->count($criteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 15;
        $pages->applyLimit($criteria);
        $faq_list = FaqQuestion::model()->findAll($criteria);

        $this->render('index', array(
            'faq_list' => $faq_list,
            'pages' => $pages,
            'main_id' => $main_id
        ));
    }

    public function actionCountView($faq_id) {
        $counter = FaqQuestion::model()->findByPk($faq_id)->counter;
        $counter += 1;
        FaqQuestion::model()->updateByPk($faq_id, array('counter' => $counter));
    }

}