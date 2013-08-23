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

        </ul>
    </div>
</div>