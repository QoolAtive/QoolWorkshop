<?php

class FeedController extends Controller {

    public function actionFeed() {
        Yii::import('application.vendors.*');
        require_once('Zend/Feed/Rss.php');
        require_once('Zend/Feed.php');
//        require_once 'Zend/Loader/Autoloader.php';
//        spl_autoload_unregister(array('YiiBase', 'autoload'));
//        spl_autoload_register(array('Zend_Loader_Autoloader', 'autoload'));
//        spl_autoload_register(array('YiiBase', 'autoload'));
        // retrieve the latest 20 posts
        $news_list = News::model()->findAll(array(
            'order' => 'date_write DESC',
            'limit' => 20,
        ));
        // convert to the format needed by Zend_Feed
        $entries = array();
        foreach ($news_list as $news) {
            $pubDate = $news['date_write']; 
            $pubDate= date("D, d M Y H:i:s T", strtotime($pubDate));
            $entries[] = array(
                'title' => $news['subject_th'],
                'link' => CHtml::normalizeUrl(array("/news/default/index/view/1")),
                'description' => $news['detail_th'],
                'lastUpdate' => date("D, d M Y H:i:s T", strtotime($pubDate)),
            );
        }
        // generate and render RSS feed
        $feed = Zend_Feed::importArray(array(
                    'title' => 'DBD News Feed',
                    'link' => $this->createUrl(''),
                    'charset' => 'UTF-8',
                    'entries' => $entries,
                        ), 'rss');
        $feed->send();
    }

}