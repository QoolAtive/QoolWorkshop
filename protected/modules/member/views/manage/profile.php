<style>
    .profile .detail{
        display: inline-block;
        width: 34%;
    }
    .profile label{
        display: inline-block;
        width: 14%;
        text-align: right;
    }
    .btnMangae li{
        width: 24%;
        padding: 50px 0   !important;
        float: left;
    }
    .btnMangae._100 {
        margin-top: -17px;
    }
</style>

<?php
$this->renderPartial('_sidebar', array());
?>

<div class="content">
    <div class="tabcontents">
        <div>
            <?php
            if (Yii::app()->user->isAdmin()) {
                ?>
                <!--  <div style="width: 30%; display: inline-block;">
                     <ul>
                         <li><a href="/member/manage/changePassword"><?php // echo Yii::t('language', 'แก้ไขรหัสผ่าน');    ?></a></li>
                     </ul>
                 </div> --> <div class="_100">

                    <h3 class="barH3">
                        <span>
                            <i class="icon-user"></i> </i><?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สมาชิก'); ?>
                        </span>
                    </h3>

                </div>
                <ul class="btnMangae _100">
                    <li><a href="/member/manage/admin#view1"><?php echo Yii::t('language', 'ยืนยันสมาชิกนิติบุคคล'); ?></a></li>
                    <li><a href="/member/manage/admin#view2"><?php echo Yii::t('language', 'สมาชิกนิติบุคคลทั้งหมด'); ?></a></li>
                    <li><a href="/member/manage/admin#view3"><?php echo Yii::t('language', 'สมาชิกบุคคลธรรมดาทั้งหมด'); ?></a></li>

                </ul>
                <div class="_100">

                    <h3 class="barH3">
                        <span>
                            <i class="icon-cog"></i> </i><?php echo Yii::t('language', 'จัดการ').Yii::t('language', 'ข้อมูลทั่วไปของเว็บไซต์'); ?>
                        </span>
                    </h3>

                </div>
                <?php
                $this->renderPartial('_setting', array());
                ?>
                <?php
            } else {
                ?>

                <div class="profile">
                    <h3 class="barH3"><?php echo Yii::t("language", 'ข้อมูลส่วนตัว'); ?></h3>
                    <hr>
                    <?php if ($profile['name'] != null) { ?>
                        <label><?php echo Yii::t("language", 'ชื่อ').' - '.Yii::t("language", 'นามสกุล')." :"; ?></label>
                        <div class="detail"><?php echo $profile['name']; ?></div>
                    <?php } ?>

                    <?php if ($profile['sex'] != null) { ?>
                        <label><?php echo Yii::t("language", 'เพศ')." :"; ?></label>
                        <div class="detail"><?php echo $profile['sex']; ?></div>
                    <?php } ?>

                    <?php if ($profile['high_education'] != null) { ?>
                        <label><?php echo Yii::t("language", 'วุฒิการศึกษา')." :"; ?></label>
                        <div class="detail"><?php echo $profile['high_education']; ?></div>
                    <?php } ?>

                    <?php if ($profile['commerce_registration'] != null) { ?>
                        <label><?php echo Yii::t("language", 'เลขพาณิชย์')." :"; ?></label>
                        <div class="detail"><?php echo $profile['commerce_registration']; ?></div>
                    <?php } ?>

                    <?php if ($profile['corporation_registration'] != null) { ?>
                        <label><?php echo Yii::t("language", 'เลขนิติบุคคล')." :"; ?></label>
                        <div class="detail"><?php echo $profile['corporation_registration']; ?></div>
                    <?php } ?>

                    <?php if ($profile['businessType'] != null) { ?>
                        <label><?php echo Yii::t("language", 'ประเภทธุรกิจ')." :"; ?></label>
                        <div class="detail"><?php echo $profile['businessType']; ?></div>
                    <?php } ?>

                    <?php if ($profile['member_type'] != null) { ?>
                        <label><?php echo Yii::t("language", 'ประเภทสมาชิก')." :"; ?></label>
                        <div class="detail"><?php echo $profile['member_type']; ?></div>
                    <?php } ?>

                    <?php if ($profile['panit'] != null) { ?>
                        <label><?php echo Yii::t("language", 'ชื่อสินค้าและบริการ')." :"; ?></label>
                        <div class="detail"><?php echo $profile['panit']; ?></div>
                    <?php } ?>

                    <?php if ($profile['address'] != null) { ?>
                        <label><?php echo Yii::t("language", 'ที่อยู่')." :"; ?></label>
                        <div class="detail"><?php echo $profile['address']; ?></div>
                    <?php } ?>

                    <?php if ($profile['tel'] != null) { ?>
                        <label><?php echo Yii::t("language", 'โทร.')." :"; ?></label>
                        <div class="detail"><?php echo $profile['tel']; ?></div>
                    <?php } ?>

                    <?php if ($profile['mobile'] != null) { ?>
                        <label><?php echo Yii::t("language", 'มือถือ')." :"; ?></label>
                        <div class="detail"><?php echo $profile['mobile']; ?></div>
                    <?php } ?>

                    <?php if ($profile['fax'] != null) { ?>
                        <label><?php echo Yii::t("language", 'โทรสาร.')." :"; ?></label>
                        <div class="detail"><?php echo $profile['fax']; ?></div>
                    <?php } ?>

                    <?php // if ($profile['facebook'] != null) {  ?>
                    <!--<label>เฟสบุ๊ค :</label>-->
                    <!--<div class="detail"><?php // echo $profile['facebook'];             ?></div>-->
                    <?php // }  ?>

                    <?php // if ($profile['twitter'] != null) {  ?>
                    <!--<label>ทวิตเตอร์ :</label>-->
                    <!--<div class="detail"><?php // echo $profile['twitter'];             ?></div>-->
                    <?php // }  ?>
                    <hr>
                    <?php
                    // if (Yii::app()->user->isMemberType() == 1) {
                    //     echo CHtml::button(Yii::t('language', 'แก้ไขข้อมูลส่วนตัว'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    //             '/member/manage/editMemberPerson'
                    //         )) . "'")
                    //     );
                    // } else {
                    //     echo CHtml::button(Yii::t('language', 'แก้ไขข้อมูลส่วนตัว'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    //             '/member/manage/editMemberRegistration'
                    //         )) . "'")
                    //     );
                    //     echo CHtml::button(Yii::t('language', 'ใช้งานร้านค้า'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    //             '/eDirectory/manage/index'
                    //         )) . "'")
                    //     );
                    // }
                    // echo CHtml::button(Yii::t('language', 'แก้ไขที่อยู่'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    //         '/member/manage/changeAddress'
                    //     )) . "'")
                    // );
                    // echo CHtml::button(Yii::t('language', 'แก้ไขรหัสผ่าน'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    //         '/member/manage/changePassword'
                    //     )) . "'")
                    // );
                    ?>
                </div>
                <?php
            }
            ?>
        </div></div></div>
