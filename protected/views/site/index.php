<!--left side-->
<div class="colleft">
    <ul class="gridmenu menuani">
        <div class="clearfix">
            <?php
            $count = KnowledgeCount::model()->count('user_id = :user_id', array(':user_id' => Yii::app()->user->id));
            if ($count > 0 || Yii::app()->user->getState('rule_knowledge')) {
                ?>
                <li class="knowledge"><a href="/knowledge/default/index"></a></li>
            <?php } else { ?>
                <li class="knowledge"><a href="/knowledge/default/ruleKnowledge"></a></li>
            <?php } ?>
            <li class="websim"><a class="agreement fancybox.iframe" href="/webSimulation/default/agreement"></a></li>
            <li class="edir"><a href="/eDirectory/default/index"></a></li>
            <li class="servicepro"><a href="/serviceProvider/default/index"></a></li>
        </div>
        <div  class="clearfix">
            <li class="link"><a href="/link/default/index"></a></li>
            <li class="faq"><a href="/faq/default/index"></a></li>
            <li class="aboutus"><a href="/about/default/index"></a></li>
            <li class="news"><a href="/news/default/index"></a></li>
        </div>

    </ul>




    <div class="newsani">
        <style type="text/css">
        .rslides{
            box-shadow:none !important;
            font-size: 13px !important;
        }
        </style>
        <?php
        $model_rss = NewsRss::model()->find();
        $this->widget(
                'ext.yii-feed-widget.YiiFeedWidget', array('url' => $model_rss->link, 'limit' => 10)
        );
        ?>
    </div>
</div>
<!--/left side-->

<!--right side-->
<div class="colright">
    <img class="left mascotani" alt="smart" src="/img/smart.png"/>
</div>
<!--/ right side-->