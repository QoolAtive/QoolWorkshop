<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/newsandactivity.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="#" rel="view1">NEWS</a></li>
            <li><a href="#" rel="view2">Calendar</a></li>
            <li><a href="#" rel="view3">Training</a></li>
            <?php if (Yii::app()->user->isAdmin()) { ?>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/news/manage/index')); ?>">Manage</a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <!--NEWS-->
        <div id="view1" class="tabcontent">

            <?php
            $rss = new rss_php;
            $rss->load('http://rssphp.net/rss.xml');
            $items = $rss->getItems(); #returns all rss items
            ?> 

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
                                <?php echo $news['detail_th']; ?>
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

        </div>
        <!--END Training-->
    </div>
</div>