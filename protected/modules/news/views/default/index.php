<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/newsandactivity.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="#" rel="view1">News</a></li>
            <li><a href="#" rel="view2">Calendar</a></li>
            <li><a href="#" rel="view3">Training</a></li>
            <?php if (Yii::app()->user->isAdmin()) { ?>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/news/manage/index')); ?>">Manage News</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/news/manage/manageTraining')); ?>">Manage Training</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/news/manage/editRss/id/1')); ?>">Manage Feed Rss</a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <!--NEWS-->

        <img src="/img/banner/about.png" class="pagebanner" alt="pagebanner"/>

        <div id="view1" class="tabcontent">
            <h3>Feed News</h3>
            <!-- Feed widget -->
            <?php
            $this->widget(
                    'ext.yii-feed-widget.YiiFeedWidget', array('url' => NewsRss::model()->find()->link, 'limit' => 5)
            );
            ?>
            <br/>
            <h3>News</h3>
            <div class="accordion" id="hideother1">
                <?php
                $i = 1;
                foreach ($newslist as $news) {
                    ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#hideother1" href="#item1<?php echo $i; ?>">
                                <?php echo $news['subject_th']; ?>
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
                                <div><?php echo $news['detail_th']; ?></div>
                                <!--รูปภาพ-->
                                <div><img src="<?php echo $news['pic']; ?>" /></div>
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
                'pages' => $pages,
            ));
            ?>
        </div>
        <!-- END NEWS-->
        <!--Calendar-->
        <div id="view2" class="tabcontent">
            <div class="row-fluid">
                <div id="calendar"></div>
            </div>
        </div>
        <!--END Calendar-->
        <!--Training-->
        <div id="view3" class="tabcontent">
            <h3>Training</h3>
            <div class="accordion" id="hideother3">
                <?php
                $i = 1;
                foreach ($trainlist as $train) {
                    ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#hideother3" href="#item3<?php echo $i; ?>">
                                <?php echo $train['subject_th']; ?>
                            </a>
                        </div>
                        <div id="item3<?php echo $i; ?>" class="accordion-body collapse <?php
                        if ($i == 1)
                            echo 'in';
                        else
                            echo '';
                        ?>">
                            <div class="accordion-inner">
                                <!--รายละเอียด-->
                                <div><?php echo $train['detail_th']; ?></div>
                                <div><?php echo CHtml::link($train['link'], $train['link'], array('target' => '_blank')); ?></div>
                                <!--วันที่เริ่ม - วันสุดท้าย-->
                                <div><?php echo Tool::ChangeDateTimeToShow($train['start_at']) . " ถึง " . Tool::ChangeDateTimeToShow($train['end_at']); ?></div>
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
                'pages' => $pages,
            ));
            ?>
        </div>
        <!--END Training-->
    </div>
</div>

<script>
    $(document).ready(function() {
        if (location.hash == "#view2") {
        }
        if (location.hash == "#view3") {
        }
    });

    // Full Calendar
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: '',
                right: 'month,basicWeek,basicDay prev,next today'
            },
//            editable: true,
            events: [
<?php
foreach ($trainlist as $train) {
    ?>
                    {
                        id: <?php echo $train['id']; ?>,
                        title: '<?php echo $train['subject_th']; ?>',
                        start: '<?php echo $train['start_at']; ?>',
                        end: '<?php echo $train['end_at']; ?>',
                        url: '<?php echo $train['link']; ?>',
                    },
<?php } ?>
            ]//END events: [
        });

    });
</script>