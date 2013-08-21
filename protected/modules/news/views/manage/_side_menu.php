<?php
switch ($manage) {
    case 2:
        $select1 = '';
        $select2 = 'selected';
        $select3 = '';
        $select4 = '';
        break;
    case 3:
        $select1 = '';
        $select2 = '';
        $select3 = 'selected';
        $select4 = '';
        break;
    case 4:
        $select1 = '';
        $select2 = '';
        $select3 = '';
        $select4 = 'selected';
        break;
    default:
        $select1 = 'selected';
        $select2 = '';
        $select3 = '';
        $select4 = '';
        break;
}
?>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/newsandactivity.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li>
                <a href="<?php echo CHtml::normalizeUrl(array('/news/default/index/view/1')); ?>" rel='view-1'>
                    <?php echo Yii::t('language', 'ข่าว'); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo CHtml::normalizeUrl(array('/news/default/index/view/2')); ?>" rel='view-2'>
                    <?php echo Yii::t('language', 'ปฏิทิน'); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo CHtml::normalizeUrl(array('/news/default/index/view/3')); ?>" rel='view-2'>
                    <?php echo Yii::t('language', 'การอบรม'); ?>
                </a>
            </li>
            <?php if (Yii::app()->user->isAdmin()) { ?>
                <li class='<?php echo $select1; ?>'>
                    <a href="<?php echo CHtml::normalizeUrl(array('/news/manage/index')); ?>" rel='manage-1'>
                        <?php echo Yii::t('language', 'จัดการ'); ?>
                        <br />
                        <?php echo Yii::t('language', 'ข่าว'); ?>
                    </a>
                </li>
                <li class='<?php echo $select2; ?>'>
                    <a href="<?php echo CHtml::normalizeUrl(array('/news/manage/manageTraining')); ?>" rel='manage-2'>
                        <?php echo Yii::t('language', 'จัดการ'); ?>
                        <br />
                        <?php echo Yii::t('language', 'การอบรม'); ?>
                    </a>
                </li>
                <li class='<?php echo $select3; ?>'>
                    <a href="<?php echo CHtml::normalizeUrl(array('/news/manage/editRss/id/1')); ?>" rel='manage-3'>
                        <?php echo Yii::t('language', 'จัดการ'); ?>
                        <br />
                        <?php echo Yii::t('language', 'RSS Feed'); ?>
                    </a>
                </li>
                <li class='<?php echo $select4; ?>'>
                    <a href="<?php echo CHtml::normalizeUrl(array('/news/manage/manageEmail')); ?>" rel='manage-4'>
                        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'อีเมล์'); ?>
                        <br />
                        <?php echo Yii::t('language', 'อีเมล์ที่สมัครรับข่าวสาร'); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>