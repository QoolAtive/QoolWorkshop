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
                        echo Yii::t('language', 'จัดการรายการร้านค้าของคุณ');
                        echo '</a>';
                        ?>
                    </li>
                    <?php
                    if (Yii::app()->user->isAdmin()) {
                        ?>
                        <li>
                            <?php
                            echo '<a href="' . CHtml::normalizeUrl(array("/webSimulation/manageShop/admin")) . '">';
                            echo Yii::t('language', 'รายการร้านค้าทั้งหมด');
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
<div class="content">
    <div class="tabcontents" >
        <img class="pagebanner" alt="pagebanner" src="/img/banner/Websimulation.png">

        <div class="websimborder" style="min-height: 400px;">

            <h3 class="textcenter" style="padding-top: 20px;">Web Simulation</h3>
            <p class="textcenter">ระบบแนะนำการทดลองการเปิดร้านค้าออนไลน์</p>

            <div class="textcenter" style="  border:1px dashed #aaa;
                 margin: 20px 40px;
                 padding: 20px 0;">
                <p class="strong">คำแนะนำการใช้งานระบบ</p>
                <p style="text-indent: 20px;"> - ระบบนี้เป็นระบบจำลองเปิดร้านค้าออนไลน์ เพื่อให้ผู้สนใจ มีความรู้ความเข้าใจในการเปิดร้านค้าออนไลน์</p>
                <!-- <p style="text-indent: 20px;"> - </p> -->


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
                        <input class="fclogin" type="button" value="กรุณาเข้าระบบก่อนใช้งาน" name="login" href="/site/login">
                        <!--                     <input type="button" value="กรุณาเข้าระบบก่อนใช้งาน"name="login">
                        -->                </div>


                    <!-- echo CHtml::link(Yii::t('language', 'Start Simulation'), '#', array(
                        'style' => "border-radius: 4px;  margin: 0 auto; vertical-align: middle; line-height:30px; display: block; width: 200px; border: 1px solid black;",
                        'onclick' => 'alert("' . Yii::t('language', 'กรุณาเข้าระบบก่อนใช้งาน') . '");',
                    )); -->
                    <?php
                }
                ?>
                <img  alt="pagebanner" width="100%" src="/img/websimbanner2.png">

                <!-- <img src="/img/smart.png" style="padding: 60px 0px;"> -->

            </div>
        </div>
    </div>
</div>
