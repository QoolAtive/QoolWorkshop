<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/Member.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="/member/manage/profile" >ข้อมูลของคุณ</a></li>
            <?php if (!Yii::app()->user->isAdmin()) { ?>
                <li><a href="/member/manage/changeAddress" >แก้ไขที่อยู่</a></li>
                <?php
                if (Yii::app()->user->isMemberType() == 2) {
                    ?>
                    <li><a href="/member/manage/editMemberRegistration" >แก้ไขข้อมูลส่วนตัว</a></li>
                    <?php
                } else
                if (Yii::app()->user->isMemberType() == 1) {
                    ?>
                    <li><a href="/member/manage/editMemberPerson" >แก้ไขข้อมูลส่วนตัว</a></li>
                    <?php
                }
                ?>
                <li><a href="/member/manage/changePassword" >แก้ไขรหัสผ่าน</a></li>
                <?php
            }
            if (Yii::app()->user->isMemberType() == 1) {
                
            } else {
                if (!Yii::app()->user->isAdmin()) {
                    ?>
                    <li><a href="/eDirectory/manage/index" >ใช้งานร้านค้า</a></li>
                    <?php
                }
            }
            ?>
            <li><a href="/serviceProvider/default/spLog" >บริการโปรด</a></li>
        </ul>
    </div>
</div>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-cog"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
                    <?php echo Yii::t('language', 'บริการ'); ?>
                </a>
                <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'บริการโปรด'); ?>
            </span>
        </h3>
        <?php
        $this->renderPartial('sp_log_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
        ?>
        <div style="text-align: center;">
            <?php
            echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/member/manage/profile'
                )) . "'")
            );
            ?>
        </div>
    </div>
</div>