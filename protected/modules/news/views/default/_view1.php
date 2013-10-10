<!--NEWS-->

<?php
$model_rss = NewsRss::model()->find();
$head_rss = LanguageHelper::changeDB($model_rss->name_th, $model_rss->name_en);
?>
<div id="view1">
    <h3 class="barH3">
        <i class='icon-rss'></i><?php echo Yii::t('language', 'RSS Feed'); ?> <i class='icon-chevron-right'></i> <?php echo $head_rss; ?>
    </h3>



    <!-- Feed widget -->
    <?php
    $this->widget(
            'ext.yii-feed-widget.YiiFeedWidget', array('url' => $model_rss->link, 'limit' => 10)
    );
    ?>
    <br/>
    <h3><i class='icon-bell-alt'></i><?php echo Yii::t('language', 'ข่าว'); ?>&nbsp;
        <a href="/news/feed/feed" alt="<?php echo Yii::t('language', 'Rss Feed') . Yii::t('language', 'ข่าว'); ?>" target="_blank">
            <i class='icon-rss'></i>
        </a>
    </h3>

    <?php
    $news_group_list = NewsGroup::model()->findAll();
    if ($news_group_list != NULL) {
        ?>
        <div class="accordion" id="hideother">
            <?php
            foreach ($news_group_list as $news_group) {
                $criteria = new CDbCriteria();
                $criteria->compare('group_id', $news_group['id']);
                $count = News::model()->count($criteria);
                $pages_news = new CPagination($count);
                // results per page
                $pages_news->pageSize = 15;
                $pages_news->applyLimit($criteria);
                $newslist = News::model()->findAll($criteria);
                if ($newslist != NULL) {
                    ?>
                    <h3>
                        <?php
                        $news_group_name = LanguageHelper::changeDB($news_group['name_th'], $news_group['name_en']);
                        echo $news_group_name;
                        ?>
                    </h3>
                    <?php
                    $i = 1;
                    foreach ($newslist as $news) {
                        $subject = LanguageHelper::changeDB($news['subject_th'], $news['subject_en']);
                        $detail = LanguageHelper::changeDB($news['detail_th'], $news['detail_en']);
                        ?>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <p class="faqarrow"></p>
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#hideother" href="#item<?php echo $news_group['id'] . $i; ?>" id="<?php echo $news['id'];?>">
                                    <?php echo $subject; ?>
                                </a>
                            </div>
                            <div id="item<?php echo $news_group['id'] . $i; ?>" class="accordion-body collapse <?php
                            if ($i == 1)
                                echo 'in';
                            else
                                echo '';
                            ?>">
                                <div class="accordion-inner">
                                    <!--share-->
                                    <div class="right">
                                        <a href="#" onclick="
                                                window.open(
                                                        'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('<?php echo $this->createAbsoluteUrl('/news/default/index/view/1#'.$news['id']);?>'),
                                                        'facebook-share-dialog',
                                                        'width=626,height=436');
                                                return false;">
                                            <img src="/img/fbshare.jpg" alt="Share on Facebook" />
                                        </a>
                                    </div>
                                    <!--รายละเอียด-->
                                    <div><?php echo $detail; ?></div>
                                    <!--รูปภาพ-->
                                    <div><img src="<?php echo $news['pic']; ?>" /></div>
                                    <?php
                                    $model_news_file = NewsFile::model()->findAll("news_id=" . $news['id']);
                                    if (isset($model_news_file)) {
                                        ?>
                                        <div>
                                            <?php
                                            echo "<h4 style='font-weight: bold'><u>" . Yii::t('language', 'แนบไฟล์') . ": </u></h4>";
                                            ?>
                                            <!--<ul class='list_files'>-->
                                            <ul class='icons-ul'>
                                                <?php
                                                foreach ($model_news_file as $k => $m) {
//                                       echo "<li class='files'>"; 
                                                    echo "<li>";
                                                    echo CHtml::link(" <i class='icon-file-text'></i> " . $m->file_name, $m->file_path, array('target' => '_blank'));
                                                    echo "</li>";
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <?php
                        if ($i == 1) {
                            //ไม่ให้ link จาก calendar ปิด accordion
                            $not_click = $news['id'];
                        }
                        $i++;
                    }
                    ?>
                    <?php
                } //if($newslist != NULL){
                ?>
                <hr>
                <?php
            } //foreach($news_group_list as $news_group){
            ?>
        </div>
        <?php
    } else { //if($news_group_list != NULL){
        echo Yii::t('language', 'ไม่พบข่าว');
    }
    ?>
    <?php
    $this->widget('CLinkPager', array(
        'pages' => $pages_news,
    ));
    ?>
</div>

<script>
    $(document).ready(function() {
        if (location.hash != '#<?php echo $not_click; ?>') {
            $(location.hash).click();
        }
    });
</script>
<!-- END NEWS-->