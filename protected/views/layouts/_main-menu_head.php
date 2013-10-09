<div class="content" >
    <div class="menutop">
        <div class="clearfix">
            <div class="lang"> 
                <?php
                $this->widget('application.components.widgets.LanguageSelector');
//                echo Yii::t('language', 'language');
                ?>
            </div>
            <ul class="loginbtnbox clearfix">
                <li class="clearfix">

                    <?php
                    if (!Yii::app()->user->id) {
                        ?>
                        <a class="createaccountbtn fancybox.iframe" href="/member/manage/registerRules">
                            <?php echo Yii::t('language', 'สร้างผู้ใช้งาน'); ?>
                        </a> 
                        <a class="loginbtn  fancybox.iframe fclogin" href="/site/login">
                            <?php echo Yii::t('language', 'เข้าระบบ'); ?>
                        </a>
                        <?php
                    } else {
                        $profile = Tool::getProfile(Yii::app()->user->id);
                        ?>
                        <a href="/site/logout" class="loginbtn " onClick="return confirm('<?php echo Yii::t('language', 'คุณต้องการออกจากระบบหรือไม่?'); ?>')">
                            <?php echo Yii::t('language', 'ออกจากระบบ'); ?>
                        </a>
                        <a href="/member/manage/profile" class="loginbtn ">
                            <?php echo $profile['name']; ?>
                        </a>
                        <?php
                    }
                    ?>
                </li>
                <li>
                    <?php
                    // google_search
                    $this->widget('application.extensions.search.GoogleSearch');
                    ?>
                </li>
            </ul>
        </div>
        <input type="checkbox" id="toggle" />
        <label for="toggle" class="toggle" data-open="Main Menu" data-close="Close Menu" onclick></label>
        <ul class="menu clearfix">
            <?php
            $count = KnowledgeCount::model()->count('user_id = :user_id', array(':user_id' => Yii::app()->user->id));
            if ($count > 0 || Yii::app()->user->getState('rule_knowledge')) {
                ?>
                <li class="knowledge"><a href="/knowledge/default/index"><?php echo Yii::t('language', 'การเรียนรู้และบทความ'); ?></a></li>
            <?php } else { ?>
                <li class="knowledge"><a href="/knowledge/default/ruleKnowledge"><?php echo Yii::t('language', 'การเรียนรู้และบทความ'); ?></a></li>
            <?php } ?>
            <li><a class="agreement fancybox.iframe" href="/webSimulation/default/agreement"><?php echo Yii::t('language', 'แนะนำการใช้งาน'); ?></a></li>
            <li><a href="/eDirectory/default/index"><?php echo Yii::t('language', 'ค้นหาร้านค้า'); ?></a></li>
            <li><a href="/serviceProvider/default"><?php echo Yii::t('language', 'ผู้ให้บริการ'); ?></a></li>
            <li><a href="/link/default/index"><?php echo Yii::t('language', 'ลิงก์หน่วยงาน'); ?></a></li>
            <li><a href="/faq/default/index"><?php echo Yii::t('language', 'คำถาม'); ?></a></li>
            <li><a href="/about/default/index"><?php echo Yii::t('language', 'เกี่ยวกับเรา'); ?></a></li>
            <li><a href="/news/default/index"><?php echo Yii::t('language', 'ข่าวสารและกิจกรรม'); ?></a> </li>

        </ul>




    </div>
</div>