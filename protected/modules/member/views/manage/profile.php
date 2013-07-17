<style>
    .profile .detail{
        display: inline-block;
        width: 34%;
    }
    .profile label{
        display: inline-block;
        width: 15%;
        text-align: right;
    }
</style>
<div>
    <?php
    if (Yii::app()->user->isAdmin()) {
        ?>
        <div style="width: 30%; display: inline-block;">
            <ul>
                <li><a href="/member/manage/changePassword"><?php echo Yii::t('language', 'แก้ไขรหัสผ่าน'); ?></a></li>
            </ul>
        </div>
        <div style="width: 70%;display: inline-block;">
            <ul class="btnMangae">
                <li><a href="/member/manage/admin"><?php echo Yii::t('language', 'ยืนยันสมาชิกนิติบุคคล'); ?></a></li>
                <li><a href="/dataCenter/default/"><?php echo Yii::t('language', 'จัดการข้อมูลทัวไป'); ?></a></li>
            </ul>
        </div>
        <?php
    } else {
        ?>
        <div class="profile">
            <h3>ข้อมูลส่วนตัว</h3>
            <hr>
            <?php if ($profile['name'] != null) { ?>
                <label>ชื่อ - นามสกุล :</label>
                <div class="detail"><?php echo $profile['name']; ?></div>
            <?php } ?>

            <?php if ($profile['sex'] != null) { ?>
                <label>เพศ :</label>
                <div class="detail"><?php echo $profile['sex']; ?></div>
            <?php } ?>

            <?php if ($profile['high_education'] != null) { ?>
                <label>วุฒิการศึกษา :</label>
                <div class="detail"><?php echo $profile['high_education']; ?></div>
            <?php } ?>

            <?php if ($profile['commerce_registration'] != null) { ?>
                <label>เลขพาณิชย์ :</label>
                <div class="detail"><?php echo $profile['commerce_registration']; ?></div>
            <?php } ?>

            <?php if ($profile['corporation_registration'] != null) { ?>
                <label>เลขนิติบุคคล :</label>
                <div class="detail"><?php echo $profile['corporation_registration']; ?></div>
            <?php } ?>

            <?php if ($profile['businessType'] != null) { ?>
                <label>ประเภทธุรกิจ :</label>
                <div class="detail"><?php echo $profile['businessType']; ?></div>
            <?php } ?>

            <?php if ($profile['member_type'] != null) { ?>
                <label>ประเภทสมาชิก :</label>
                <div class="detail"><?php echo $profile['member_type']; ?></div>
            <?php } ?>

            <?php if ($profile['panit'] != null) { ?>
                <label>ชื่อสินค้าและบริการ :</label>
                <div class="detail"><?php echo $profile['panit']; ?></div>
            <?php } ?>

            <?php if ($profile['address'] != null) { ?>
                <label>ที่อยู่ :</label>
                <div class="detail"><?php echo $profile['address']; ?></div>
            <?php } ?>

            <?php if ($profile['tel'] != null) { ?>
                <label>โทรศัพท์ :</label>
                <div class="detail"><?php echo $profile['tel']; ?></div>
            <?php } ?>

            <?php if ($profile['mobile'] != null) { ?>
                <label>มือถือ :</label>
                <div class="detail"><?php echo $profile['mobile']; ?></div>
            <?php } ?>

            <?php if ($profile['fax'] != null) { ?>
                <label>แฟกช์ :</label>
                <div class="detail"><?php echo $profile['fax']; ?></div>
            <?php } ?>

            <?php // if ($profile['facebook'] != null) {  ?>
            <!--<label>เฟสบุ๊ค :</label>-->
            <!--<div class="detail"><?php // echo $profile['facebook'];        ?></div>-->
            <?php // }  ?>

            <?php // if ($profile['twitter'] != null) {  ?>
            <!--<label>ทวิตเตอร์ :</label>-->
            <!--<div class="detail"><?php // echo $profile['twitter'];        ?></div>-->
            <?php // }  ?>
            <hr>
            <?php
            if (Yii::app()->user->isMemberType() == 1) {
                echo CHtml::button(Yii::t('language', 'แก้ไขข้อมูลส่วนตัว'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/member/manage/editMemberPerson'
                    )) . "'")
                );
            } else {
                echo CHtml::button(Yii::t('language', 'แก้ไขข้อมูลส่วนตัว'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/member/manage/editMemberRegistration'
                    )) . "'")
                );
            }
            echo CHtml::button(Yii::t('language', 'แก้ไขที่อยู่'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/member/manage/changeAddress'
                )) . "'")
            );
            echo CHtml::button(Yii::t('language', 'แก้ไขรหัสผ่าน'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/member/manage/changePassword'
                )) . "'")
            );
            ?>
        </div>
        <?php
    }
    ?>
</div>
