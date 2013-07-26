<?php

class DefaultController extends Controller {

    public function actionIndex($view = NULL) {
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
            'view' => $view
        ));
    }

}