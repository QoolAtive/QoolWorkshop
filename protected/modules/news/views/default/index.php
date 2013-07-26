<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/newsandactivity.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="<?php echo CHtml::normalizeUrl(array('/news/default/index/view/1')); ?>">
                    <?php echo Yii::t('language', 'News'); ?></a></li>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/news/default/index/view/2')); ?>">
                <?php echo Yii::t('language', 'Calendar'); ?></a></li>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/news/default/index/view/3')); ?>">
                    <?php echo Yii::t('language', 'Training'); ?></a></li>
            <?php if (Yii::app()->user->isAdmin()) { ?>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/news/manage/index')); ?>">
                        <?php echo Yii::t('language', 'Manage News'); ?></a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/news/manage/manageTraining')); ?>">
                        <?php echo Yii::t('language', 'Manage Training'); ?></a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/news/manage/editRss/id/1')); ?>">
                        <?php echo Yii::t('language', 'Manage Feed Rss'); ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <img src="<?php echo Yii::t('language', '/img/banner/about.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <?php
        if ($view == '2') {
            //calendar
            $this->renderPartial('_view2', array('trainlist' => $trainlist));
        } else if ($view == '3') {
            //training
            $this->renderPartial('_view3', array('trainlist' => $trainlist, 'pages2' => $pages2));
        } else {
            //news
            $this->renderPartial('_view1', array('newslist' => $newslist, 'pages1' => $pages1)); // เริ่มต้นที่หน้านี้
        }
        ?>

    </div>
</div>
