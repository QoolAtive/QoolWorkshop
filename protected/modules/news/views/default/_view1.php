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
    <div class="accordion" id="hideother1">
        <?php
        $i = 1;
        foreach ($newslist as $news) {
            $subject = LanguageHelper::changeDB($news['subject_th'], $news['subject_en']);
            $detail = LanguageHelper::changeDB($news['detail_th'], $news['detail_en']);
            ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <p class="faqarrow"></p>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#hideother1" href="#item1<?php echo $i; ?>">
                        <?php echo $subject; ?>
                    </a>
                </div>
                <div id="item1<?php echo $i; ?>" class="accordion-body collapse <?php
                if ($i == 1)
                    echo 'in';
                else
                    echo '';
                ?>">
                    <div class="accordion-inner">
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
            $i++;
        }
        ?>
    </div>
    <?php
    $this->widget('CLinkPager', array(
        'pages' => $pages_news,
    ));
    ?>
</div>
<!-- END NEWS-->