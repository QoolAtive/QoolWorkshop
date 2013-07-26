<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/newsandactivity.png'); ?>"/></li>
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