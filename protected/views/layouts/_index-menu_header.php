<div class="colright">
    <ul class="loginbtnbox">
        <li class="clearfix">  
            <?php
            if (!Yii::app()->user->id) {
                ?>
                <a class="createaccountbtn fancybox" href="/member/manage/registerRules">
                    <?php echo Yii::t('language', 'สร้างผู้ใช้งาน'); ?>
                </a> 
                <a class="loginbtn fancybox fclogin" href="/site/login">
                    <?php echo Yii::t('language', 'เข้าระบบ'); ?>
                </a>
                <?php
            } else {
                $profile = Tool::getProfile();
                ?>
                <a href="/site/logout" class="loginbtn " onClick="return confirm('<?php echo Yii::t('language', 'คุณต้องการออกจากระบบหรือไม่?'); ?>')">
                    <?php echo Yii::t('language', 'ออกจากระบบ'); ?>
                </a>
                <a href="/member/manage/profile" class="loginbtn " >
                    <?php echo $profile['name']; ?>
                </a>
                <?php
            }
            ?>
        </li>

<!--        <li class="clearfix " style="width: 100%;">
            <div class="lang txt-right"> 
                <?php
//                $this->widget('application.components.widgets.LanguageSelector');
                ?>
            </div>
        </li>-->
    </ul> 
</div>