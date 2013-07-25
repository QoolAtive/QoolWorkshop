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
            <li>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq')); ?>">                   
                    <?php
                    // Manage
                    echo Yii::t('language', 'จัดการ') . " " . Yii::t('language', 'คำถาม');
                    ?>
                </a>
            </li>
        <?php } ?>
    </ul>
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
            $this->renderPartial('_view1', array('faq1' => $faq1, 'pages1' => $pages1));// เริ่มต้นที่หน้านี้
        }
        ?>
    </div>
</div>
