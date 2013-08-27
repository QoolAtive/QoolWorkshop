<?php
$this->renderPartial('side_bar', array(
    'active' => 4,
));

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'insert_company-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));

 if (empty($model->company_motion_setting_id)) {
            $word = 'เพิ่ม';
        } else {
            $word = 'แก้ไข';
        }
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
                <?php
                echo CHtml::link(Yii::t('language', 'ตั้งค่าความเคลื่อนไหว'), array('/eDirectory/admin/motionSetting'));
                ?>  
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . Yii::t('language', 'ความเคลื่อนไหว'); ?> 

            </span>
        </h3>
        <div style="border: 1px solid red; padding: 10px 5px; color: red; font-weight: bold; background-color: pink; text-align: center; margin-bottom: 10px;">
            <?php echo Yii::t('language', 'ตั้งค่าร้านค้าที่ไม่มีการอัพเดตของข้อมูล เพื่อแจ้งเตือนต่อผู้เป็นเจ้าของร้านค้า'); ?>
        </div>
        <div class="clearfix">
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'amount');
                echo $form->textField($model, 'amount');
                echo $form->error($model, 'amount');
                ?>
            </div>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'type');
                echo $form->dropDownList($model, 'type', array(
                    'วัน' => Yii::t('language', 'วัน'),
                    'เดือน' => Yii::t('language', 'เดือน'),
                    'ปี' => Yii::t('language', 'ปี')), array(
                    'empty' => ' - ' . Yii::t('language', 'เลือก') . ' - '
                ));
                echo $form->error($model, 'type');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'use');
                echo $form->radioButtonList($model, 'use', array(
                    '0' => Yii::t('language', 'ไม่เลือกใช้งาน'),
                    '1' => Yii::t('language', 'เลือกใช้งาน')), array(
                    'empty' => Yii::t('language', 'เลือก'),
                        'separator' => ' | ',
                        
                ));
                echo $form->error($model, 'use');
                ?>
            </div>
        </div>
        <div class='textcenter'>
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/motionSetting'
                )) . "'")
            );
            ?>
            <hr>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>