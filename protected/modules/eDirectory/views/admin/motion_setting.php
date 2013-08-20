<?php
$list = array(
    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
    array('text' => Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'), 'link' => '/eDirectory/admin/companyWaiting', 'select' => ''),
    array('text' => Yii::t('language', 'ความเคลื่อนไหว'), 'link' => '/eDirectory/admin/companyMotion', 'select' => ''),
    array('text' => Yii::t('language', 'ตั้งค่าความเคลื่อนไหว'), 'link' => '/eDirectory/admin/MotionSetting', 'select' => 'selected'),
);

$this->renderPartial('side_bar', array(
    'list' => $list,
));
?>

<div class="content">
    <div class="tabcontents">
        <hr>
        <div class="_100 clearfix" style="border: 1px solid red; padding: 10px 5px; color: red; font-weight: bold; background-color: pink; text-align: center;">
            <?php
            $motion_setting = CompanyMotionSetting::model()->find('`use` = 1');
            echo Yii::t('language', 'กำหนดความเคลื่อนไหวร้านค้าไม่เกิน') . ' ' . $motion_setting->amount . ' ' . Yii::t('language', $motion_setting->type) . "<br />";
            ?>
        </div>
        <hr>
        <div class='clearfix'></div>
        <hr>
        <div class='textcenter'>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ความเคลื่อนไหว'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/motionSettingInsert'
                )) . "'")
            );
            ?>
        </div>
        <hr>


        <?php
        $this->renderPartial('motion_setting_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
        ?>
    </div>
</div>