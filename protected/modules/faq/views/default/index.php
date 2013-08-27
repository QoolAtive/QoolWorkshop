<?php
switch ($view) {
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
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/faq.png'); ?>"/></li>
        </ul>

        <ul class="tabs clearfix">
            <li class='<?php echo $select1; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/1')); ?>" rel='view-1'>
                    <?php
                    //FAQ Service Provider 
                    echo Yii::t('language', 'คำถาม') . Yii::t('language', 'บริการ');
                    ?>
                </a>
            </li>
            <li class='<?php echo $select2; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/2')); ?>" rel='view-2'>
                    <?php
                    //FAQ Knowledge & Learning
                    echo Yii::t('language', 'คำถาม') . Yii::t('language', 'การเรียนรู้<br />และบทความ');
                    ?>
                </a>
            </li>
            <li class='<?php echo $select3; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/3')); ?>" rel='view-3'>
                    <?php
                    //FAQ E-Directory
                    echo Yii::t('language', 'คำถาม') . Yii::t('language', 'ค้นหาร้านค้า');
                    ?>
                </a>
            </li>
            <li class='<?php echo $select4; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/4')); ?>" rel='view-4'>
                    <?php
                    //FAQ Web Simulation
                    echo Yii::t('language', 'คำถาม') . Yii::t('language', 'แนะนำ<br />การใช้งาน');
                    ?>
                </a>
            </li>
            <?php if (Yii::app()->user->isAdmin()) { ?>
                <li class=''>
                    <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/1')); ?>" rel='manage1'>
                        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม'); ?><br/>
                        <?php echo Yii::t('language', 'บริการ'); ?>
                    </a>
                </li>
                <li class=''>
                    <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/2')); ?>" rel='manage2'>
                        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม'); ?><br/>
                        <?php echo Yii::t('language', 'การเรียนรู้<br />และบทความ'); ?>
                    </a>
                </li>
                <li class=''>
                    <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/3')); ?>" rel='manage3'>
                        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม'); ?><br/>
                        <?php echo Yii::t('language', 'ค้นหาร้านค้า'); ?>
                    </a>
                </li>
                <li class=''>
                    <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/4')); ?>" rel='manage4'>
                        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม'); ?><br/>
                        <?php echo Yii::t('language', 'แนะนำการใช้งาน'); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>


<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <?php
        if ($view == '2') {
            $this->renderPartial('_view2', array('faq2' => $faq2, 'pages2' => $pages2));
        } else if ($view == '3') {
            $this->renderPartial('_view3', array('faq3' => $faq3, 'pages3' => $pages3));
        } else if ($view == '4') {
            $this->renderPartial('_view4', array('faq4' => $faq4, 'pages4' => $pages4));
        } else {
            $this->renderPartial('_view1', array('faq1' => $faq1, 'pages1' => $pages1)); // เริ่มต้นที่หน้านี้
        }
        ?>
    </div>
</div>
