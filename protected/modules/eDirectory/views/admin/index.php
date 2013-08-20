<?php
$list = array(
    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '#', 'select' => 'selected'),
    array('text' => Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'), 'link' => '/eDirectory/admin/companyWaiting', 'select' => ''),
    array('text' => Yii::t('language', 'ความเคลื่อนไหว'), 'link' => '/eDirectory/admin/companyMotion', 'select' => ''),
    array('text' => Yii::t('language', 'ตั้งค่าความเคลื่อนไหว'), 'link' => '/eDirectory/admin/motionSetting', 'select' => ''),
);

$this->renderPartial('side_bar', array(
    'list' => $list,
))
?>
<div class="content">
    <div class="tabcontents">
        <hr>
        <div class='textcenter'>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ร้านค้า'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/insertCompany'
                )) . "'")
            );
            echo CHtml::button(Yii::t('language', 'อัพโหลด') . Yii::t('language', 'ร้านค้า'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/companyUpload'
                )) . "'")
            );
            ?>
        </div>
        <hr>
        <h3><?php echo Yii::t('language', 'ร้านค้าโดยผู้ดูแลระบบ'); ?></h3>
        <?php
        $this->renderPartial('company_grid_admin', array(
            'dataProvider' => $dataProviderAdmin,
            'model' => $modelAdmin,
        ));
        ?>
        <hr>
        <h3><?php echo Yii::t('language', 'ร้านค้าโดยสมาชิก'); ?></h3>
        <?php
        $this->renderPartial('company_grid_user', array(
            'dataProvider' => $dataProviderUser,
            'model' => $modelUser,
        ));
        ?>
    </div>
</div>
