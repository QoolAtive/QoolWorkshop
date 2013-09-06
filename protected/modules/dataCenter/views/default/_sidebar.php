<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/setting.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li class="<?php echo $selectEdu; ?>">
                <a href="/dataCenter/default/highEducation" >
                    <?php echo Yii::t('language', 'ระดับการศึกษา'); ?>
                </a>
            </li>
            <li class="<?php echo $selectTBusiness; ?>">
                <a href="/dataCenter/default/companyTypeBusiness" >
                    <?php echo Yii::t('language', 'ประเภทร้านค้า'); ?>
                </a>
            </li>
            <li class="<?php echo $selectSex; ?>">
                <a href="/dataCenter/default/sex" >
                    <?php echo Yii::t('language', 'เพศ'); ?>
                </a>
            </li>
            <li class="<?php echo $selectTname; ?>">
                <a href="/dataCenter/default/titleName" >
                    <?php echo Yii::t('language', 'คำนำหน้า'); ?>
                </a>
            </li>
            <li class="<?php echo $selectTweb; ?>">
                <a href="/dataCenter/default/titleWeb" >
                    <?php echo Yii::t('language', 'ชื่อเว็บ'); ?>
                </a>
            </li>
            <li class="<?php echo $selectDes; ?>">
                <a href="/dataCenter/default/description" >
                    <?php echo Yii::t('language', 'รายละเอียด'); ?>
                </a>
            </li>
            <li class="<?php echo $selectKey; ?>">
                <a href="/dataCenter/default/keyword" >
                    <?php echo Yii::t('language', 'คำสำคัญ'); ?>
                </a>
            </li>
            <li>
                <a href="/dataCenter/default/siteMap" >
                    <?php echo Yii::t('language', 'แผนที่เว็บไซต์'); ?>
                </a>
            </li>
        </ul>
    </div>
</div>