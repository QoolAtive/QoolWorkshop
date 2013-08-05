<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/websim.png'); ?>"/></li>
        </ul>

    </div>
</div>
<div class="content">
    <div class="tabcontents" >
        <h3 class="headfont"> </h3>
        <p class="textcenter" style="margin-top: 100px; font-size: 18px;">  <?php echo Yii::t('language', 'Congratulation'); ?> </p>
        <p class="textcenter" style="margin-bottom: 100px;  font-size: 18px;">
            <?php echo Yii::t('language', 'ร้านค้าของคุณได้ถูกสร้างขึ้นแล้ว'); ?>
        </p>

        <p class="textcenter">
            <?php
            echo CHtml::button(Yii::t('language', 'ดูร้านค้าของคุณ'), array(
                'onclick' => "window.location = '" . CHtml::normalizeUrl(array()) . "'",
            ));
            echo CHtml::button(Yii::t('language', 'จัดการร้านค้าของคุณ'), array(
                'onclick' => "window.location = '" . CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopList')) . "'",
            ));
            ?>
<!--            <input class="purple" type="submit" name="yt0" value="ดูร้านค้าของคุณ"> 
            <input type="button" value="จัดการร้านค้าของคุณ" name="yt0" onclick="window.location = 'web-sim-dashboard.html'">-->
        </p>


    </div>
</div>