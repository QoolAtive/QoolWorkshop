<style type="text/css">
ul.tabs li{
    opacity: 1 !important;
}
</style>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/websim.png'); ?>"/></li>
        </ul>
        <?php
        if (isset(Yii::app()->user->id)) {
            $mem_id = Yii::app()->user->id;
            $shop = WebShop::model()->findByAttributes(array('mem_user_id' => $mem_id));
            if ($shop != NULL) {
                ?>
                <ul class="tabs clearfix">
                    <li>
                        <?php
                        echo '<a href="' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopList")) . '">';
                        echo Yii::t('language', 'จัดการ<br />รายการร้านค้า<br />ของคุณ');
                        echo '</a>';
                        ?>
                    </li>
                    <?php
                    if (Yii::app()->user->isAdmin()) {
                        ?>
                        <li>
                            <?php
                            echo '<a href="' . CHtml::normalizeUrl(array("/webSimulation/manageShop/admin")) . '">';
                            echo Yii::t('language', 'รายการ<br />ร้านค้าทั้งหมด');
                            echo '</a>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php }
        }
        ?>
    </div>
</div>
<div class="content" >

</div>


    <div class="tabcontents" >
        <img class="pagebanner" alt="pagebanner" src="/img/banner/Websimulation.png">
        <div class="websimborder">
        <div class="websimbox">
            <h3 class="textcenter">Web Simulation</h3>
            <p class="textcenter">ระบบแนะนำการทดลองการเปิดร้านค้าออนไลน์</p>
                <div class="textcenter websimdes">
                    <p class="strong">คำแนะนำการใช้งานระบบ</p>
                    <p> - ระบบนี้เป็นระบบจำลองเปิดร้านค้าออนไลน์ เพื่อให้ผู้สนใจ มีความรู้ความเข้าใจในการเปิดร้านค้าออนไลน์</p>
                </div>

            <div class="textcenter" >
                <?php
                if (isset(Yii::app()->user->id)) {
                    ?>
                    <div class="_100">
                        <input type="button" value="Start Simulation" name="yt1" onclick="window.location = '/webSimulation/manageShop/register'">
                    </div>
                    <!--             echo CHtml::link(Yii::t('language', 'Start Simulation'), CHtml::normalizeUrl(array("/webSimulation/manageShop/register")), array(
                                    'style' => "border-radius: 4px;  margin: 0 auto; vertical-align: middle; line-height:30px; display: block; width: 200px; border: 1px solid black;",
                                ));
                    -->            <?php
                } else {
                    ?>

                    <div class="_100">
                    <input class="fclogin" type="button" value="กรุณาสมัครสมาชิกหรือเข้าสู่ระบบก่อนใช้งาน" name="login" href="/site/login">
                        <!--  <input type="button" value="กรุณาเข้าระบบก่อนใช้งาน"name="login">
                        -->                

                    </div>


                    <!-- echo CHtml::link(Yii::t('language', 'Start Simulation'), '#', array(
                        'style' => "border-radius: 4px;  margin: 0 auto; vertical-align: middle; line-height:30px; display: block; width: 200px; border: 1px solid black;",
                        'onclick' => 'alert("' . Yii::t('language', 'กรุณาเข้าระบบก่อนใช้งาน') . '");',
                    )); -->
                    <?php
                }
                ?>

                <!-- <img src="/img/smart.png" style="padding: 60px 0px;"> -->
</div>
            </div>
        </div>
    </div>
