<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/faq.png'); ?>"/></li>
        </ul>
    </div>

    <ul class="tabs clearfix">
        <li>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/1')); ?>">
                <?php
                //FAQ Service Provider 
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'บริการ');
                ?>
            </a>
        </li>
        <li>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/2')); ?>">
                <?php
                //FAQ Knowledge & Learning
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'การเรียนรู้และบทความ');
                ?>
            </a>
        </li>
        <li>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/3')); ?>">
                <?php
                //FAQ E-Directory
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'ค้นหาร้านค้า');
                ?>
            </a>
        </li>
        <li>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/4')); ?>">
                <?php
                //FAQ Web Simulation
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'แนะนำการใช้งาน');
                ?>
            </a>
        </li>
        <?php if (Yii::app()->user->isAdmin()) { ?>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/1')); ?>">
                    <?php echo Yii::t('language', 'จัดการคำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'บริการ'); ?>
                </a></li>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/2')); ?>">
                    <?php echo Yii::t('language', 'จัดการคำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'การเรียนรู้และบทความ'); ?>
                </a></li>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/3')); ?>">
                    <?php echo Yii::t('language', 'จัดการคำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'ค้นหาร้านค้า'); ?>
                </a></li>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/4')); ?>">
                    <?php echo Yii::t('language', 'จัดการคำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'แนะนำการใช้งาน'); ?>
                </a></li>
        <?php } ?>
    </ul>
</div>

<div class="content">
    <div class="tabcontents" >
        <h3><?php echo Yii::t('language', 'จัดการคำถาม'); ?></h3>
        <?php
        if ($view == '2') {
            $this->renderPartial('_manage2', array('model' => $model,));
        } else if ($view == '3') {
            $this->renderPartial('_manage3', array('model' => $model,));
        } else if ($view == '4') {
            $this->renderPartial('_manage4', array('model' => $model,));
        } else {
            $this->renderPartial('_manage1', array('model' => $model,)); // เริ่มต้นที่หน้านี้
        }
        ?>
    </div>
</div>

<?php

function strip($data, $len) {
    $data = strip_tags(trim($data));
    if (strlen($data) > $len) {
        $return = txtTruncate($data, $len);
        $return .= " ...";
    } else {
        $return = $data;
    }
    return $return;
}

function txtTruncate($string, $limit, $break = " ") {
    if (strlen($string) <= $limit)
        return $string;
    if (false !== ($breakpoint = strpos($string, $break, $limit))) {
        if ($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint);
        }
    }
    return $string;
}
?>