<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t("language", '/img/iconpage/Member.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="/member/manage/profile" ><?php echo Yii::t("language", 'ข้อมูลของคุณ'); ?></a></li>
            <?php if (Yii::app()->user->id != 3) { ?>
                <li><a href="/member/manage/changeAddress" ><?php echo Yii::t("language", 'แก้ไขที่อยู่'); ?></a></li>
                <?php
                if (Yii::app()->user->isMemberType() == 2) {
                    ?>
                    <li><a href="/member/manage/editMemberRegistration" ><?php echo Yii::t("language", 'แก้ไขข้อมูลส่วนตัว'); ?></a></li>
                    <?php
                } else
                if (Yii::app()->user->isMemberType() == 1) {
                    ?>
                    <li><a href="/member/manage/editMemberPerson" ><?php echo Yii::t("language", 'แก้ไขข้อมูลส่วนตัว'); ?></a></li>
                    <?php
                }
                ?>
                <li><a href="/member/manage/changePassword" ><?php echo Yii::t("language", 'แก้ไขรหัสผ่าน'); ?></a></li>
                <?php
            }
//            if (Yii::app()->user->isMemberType() == 2) {
                if (!Yii::app()->user->isAdmin()) {
                    ?>
                    <li><a href="/eDirectory/manage/index" ><?php echo Yii::t("language", 'ใช้งานร้านค้า'); ?></a></li>
                    <?php
                }
//            }
            ?>
            <?php if (!Yii::app()->user->isAdminType()) { ?>
                <li><a href="/serviceProvider/default/spLog" ><?php echo Yii::t("language", 'บริการโปรด'); ?></a></li>
            <?php } ?>
            <?php if (Yii::app()->user->id == 3) { ?>
                <li>
                    <a href="http://www.google.com/intl/<?php echo Yii::t("language", 'th'); ?>/analytics/" target="_blank" >
                        <?php echo Yii::t("language", 'สถิติของเว็บไซต์'); ?>
                    </a>
                </li>
            <?php } ?>
            <?php if (Yii::app()->user->isAdminType()) { ?>
                <li>
                    <a href="/rights" >
                        <?php echo Yii::t("language", 'จัดการ') . Yii::t("language", 'สิทธิ์'); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>