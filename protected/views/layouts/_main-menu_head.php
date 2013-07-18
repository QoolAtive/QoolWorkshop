<div class="content" >
    <div class="menutop">
        <div class="clearfix">
            <ul class="loginbtnbox clearfix">
                <li class="clearfix">
                    <div class="lang"> 
<!--                        <a href="#"><img alt="US" src="/img/us.png"></a> 
                        <a href="#"><img alt="TH" src="/img/th.png"></a> -->
                        <?php
                        $this->widget('application.components.widgets.LanguageSelector');
                        echo Yii::t('language', 'language');
                        ?>
                    </div>
                    <?php
                    if (!Yii::app()->user->id) {
                        ?>
                        <a class="createaccountbtn fancybox.iframe" href="/member/manage/registerRules">Create Account</a> 
                        <a class="loginbtn  fancybox.iframe" href="/site/login">Login</a>
                        <?php
                    } else {
                        $profile = Tool::getProfile(Yii::app()->user->id);
                        ?>
                        <a href="/site/logout" class="loginbtn " onClick="return confirm('<?php echo Yii::t('language', 'คุณต้องการออกจากระบบหรือไม่?'); ?>')">Logout</a>
                        <a href="/member/manage/profile" class="loginbtn "><?php echo $profile['name']; ?></a>
                        <?php
                    }
                    ?>
                </li>
                <li>
                    <input class="searchbox" placeholder="Search" type="text"  name="" value="" />                     
                </li>
            </ul>
        </div>

        <ul class="menu clearfix">
            <li><a href="/knowledge/default/index"><?php echo Yii::t('language', 'การเรียนรู้และบทความ'); ?></a></li>
            <li><a href="web-simulation.html"><?php echo Yii::t('language', 'แนะนำการใช้งาน'); ?></a></li>
            <li><a href="e-directory.html"><?php echo Yii::t('language', 'ค้นหาร้านค้า'); ?></a></li>
            <li><a href="/serviceProvider/default"><?php echo Yii::t('language', 'บริการ'); ?></a></li>
        </ul>
        <ul class="menu clearfix">
            <li><a href="/link/default/index"><?php echo Yii::t('language', 'ลิงก์หน่วยงาน'); ?></a></li>
            <li><a href="/faq/default/index"><?php echo Yii::t('language', 'คำถาม'); ?></a></li>
            <li><a href="/about/default/index"><?php echo Yii::t('language', 'เกี่ยวกับเรา'); ?></a></li>
            <li><a href="/news/default/index"><?php echo Yii::t('language', 'ข่าวสารและกิจกรรม'); ?></a> </li>
        </ul>
    </div>
</div>
