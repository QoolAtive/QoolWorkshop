<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/websim.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a rel="view-1" href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopList")); ?>">
                    <?php echo Yii::t('language', 'จัดการร้านค้า'); ?>
                </a></li>

    </div>
</div>
<div class="content">
    <div class="tabcontents" >
        <div class="websimborder" style="min-height: 400px; text-align:center;">

            <h2>Web Simulation</h2>

            <p>First thing, take a tour of web Simulation, or setup Your Process</p>

            <p></p>
            <?php
            if (isset(Yii::app()->user->id)) {
                echo CHtml::link(Yii::t('language', 'Start Simulation'), CHtml::normalizeUrl(array("/webSimulation/manageShop/register")), array(
                    'style' => "border-radius: 4px;  margin: 0 auto; vertical-align: middle; line-height:30px; display: block; width: 200px; border: 1px solid black;",
                ));
            } else {
                echo CHtml::link(Yii::t('language', 'Start Simulation'), '#', array(
                    'style' => "border-radius: 4px;  margin: 0 auto; vertical-align: middle; line-height:30px; display: block; width: 200px; border: 1px solid black;",
                    'onclick' => 'alert("' . Yii::t('language', 'กรุณาเข้าระบบก่อนใช้งาน') . '");',
                ));
            }
            ?>

            <img src="/img/smart.png">

        </div>

    </div>
</div>
