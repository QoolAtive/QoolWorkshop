<div class="sidebar">
    <div class="menuitem">
        <ul>           
            <li class="boxhead" style="background: url('<?php echo Yii::t('language', '/img/iconpage/edir.png'); ?>'); background-size: 227px; margin-left: -1px; " ></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            echo "<li>";
            echo CHtml::link(Yii::t('language', 'หน้าร้านค้า'), array('/eDirectory/default/index'), array('rel' => 'view1'));
            echo "</li>";
            if (Yii::app()->user->isAdmin()) {
                echo '<li>' . CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'), array('/eDirectory/admin/index'), array('rel' => 'view2', 'class' => 'selected')) . '</li>';
            }
            ?>
        </ul>
        <div class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
             border-top: 2px solid gold;
             font-size: 16px;
             margin-top: 6px;
             padding: 14px 0;">
            <p style="font-weight: bold;">
                <?php
                echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า');
                ?>
            </p>
        </div>
        <ul class="rectangle-list">
            <p class="demoline"></p>
            <?php
            echo "<li>";
            echo CHtml::link(Yii::t('language', 'ร้านค้าทั้งหมด'), array(
                '/eDirectory/admin/index'), array(
                'rel' => 'admin1',
                'class' => $active == '1' ? 'menuactive listactive' : ''
            ));
            echo "</li>";

            echo "<li>";
            echo CHtml::link(Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'), array(
                '/eDirectory/admin/companyWaiting'), array(
                'rel' => 'admin2',
                'class' => $active == '2' ? 'menuactive listactive' : ''
            ));
            echo "</li>";

            echo "<li>";
            echo CHtml::link(Yii::t('language', 'ความเคลื่อนไหว'), array(
                '/eDirectory/admin/companyMotion'), array(
                'rel' => 'admin3',
                'class' => $active == '3' ? 'menuactive listactive' : ''
            ));
            echo "</li>";

            echo "<li>";
            echo CHtml::link(Yii::t('language', 'ตั้งค่าความเคลื่อนไหว'), array(
                '/eDirectory/admin/motionSetting'), array(
                'rel' => 'admin4',
                'class' => $active == '4' ? 'menuactive listactive' : ''
            ));
            echo "</li>";

            if ($active == 5 && $company_id != '') {
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าและบริการ'), array(
                    '/eDirectory/admin/product/id/' . $company_id), array(
                    'rel' => 'admin5',
                    'class' => $active == '5' ? 'menuactive listactive' : ''
                ));
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</div>