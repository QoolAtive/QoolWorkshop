<?php
switch ($view) {
    case 2:
        $select1 = '';
        $select2 = 'selected';
        $select3 = '';
        break;
    case 3:
        $select1 = '';
        $select2 = '';
        $select3 = 'selected';
        break;
    default:
        $select1 = 'selected';
        $select2 = '';
        $select3 = '';
        break;
}
?>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/newsandactivity.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li class='<?php echo $select1; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/news/default/index/view/1')); ?>" rel='view-1'>
                    <?php echo Yii::t('language', 'ข่าว'); ?>
                </a>
            </li>
            <li class='<?php echo $select2; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/news/default/index/view/2')); ?>" rel='view-2'>
                    <?php echo Yii::t('language', 'ปฏิทิน'); ?>
                </a>
            </li>
            <li class='<?php echo $select3; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/news/default/index/view/3')); ?>" rel='view-3'>
                    <?php echo Yii::t('language', 'การอบรม'); ?>
                </a>
            </li>
            <?php if (Yii::app()->user->isAdmin()) { ?>
                <li>
                    <a href="<?php echo CHtml::normalizeUrl(array('/news/manage/index')); ?>" rel='manage-1'>
                        <?php echo Yii::t('language', 'จัดการ'); ?>
                        <br />
                        <?php echo Yii::t('language', 'ข่าว'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo CHtml::normalizeUrl(array('/news/manage/manageTraining')); ?>" rel='manage-2'>
                        <?php echo Yii::t('language', 'จัดการ'); ?>
                        <br />
                        <?php echo Yii::t('language', 'การอบรม'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo CHtml::normalizeUrl(array('/news/manage/editRss/id/1')); ?>" rel='manage-3'>
                        <?php echo Yii::t('language', 'จัดการ'); ?>
                        <br />
                        <?php echo Yii::t('language', 'RSS Feed'); ?>
                    </a>
                </li>
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
