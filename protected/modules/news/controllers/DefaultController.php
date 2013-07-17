<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $count = FaqQuestion::model()->count($criteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 15;
        $pages->applyLimit($criteria);
        $newslist = News::model()->findAll($criteria);
        
        $trainlist = Training::model()->findAll();
        $this->render('index', array('newslist' => $newslist, 'trainlist' => $trainlist, 'pages' => $pages));
    }

}