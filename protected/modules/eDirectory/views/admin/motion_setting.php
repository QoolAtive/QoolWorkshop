<?php
$this->renderPartial('side_bar', array(
    'active' => 4,
));
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-home"></i>
                <?php
                echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'), array('/eDirectory/admin/index'));
                ?>        
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'ตั้งค่าความเคลื่อนไหว'); ?>   
            </span>
        </h3>
        <div style="border: 1px solid red; padding: 10px 5px; color: red; font-weight: bold; background-color: pink; text-align: center; margin-bottom: 10px;">
            <?php
            $motion_setting = CompanyMotionSetting::model()->find('`use` = 1');
            echo Yii::t('language', 'ร้านค้าที่ข้อมูลไม่มีการอัพเดทเกิน') . ' ' . $motion_setting->amount . ' ' . Yii::t('language', $motion_setting->type) . "<br />";
            ?>
        </div>
        <div class='textcenter'>
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ความเคลื่อนไหว'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/motionSettingInsert'
                )) . "'")
            );
            ?>
            <hr>
        </div>

        <?php
        $this->renderPartial('motion_setting_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
        ?>
    </div>
</div>