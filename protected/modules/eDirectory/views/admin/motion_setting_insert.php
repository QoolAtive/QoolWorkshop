<?php
$list = array(
    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
    array('text' => Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'), 'link' => '/eDirectory/admin/companyWaiting', 'select' => ''),
    array('text' => Yii::t('language', 'ความเคลื่อนไหว'), 'link' => '/eDirectory/admin/companyMotion', 'select' => ''),
    array('text' => Yii::t('language', 'ตั้งค่าความเคลื่อนไหว'), 'link' => '/eDirectory/admin/MotionSetting', 'select' => ''),
    array('text' => Yii::t('language', 'เพิ่มความเคลื่อนไหว'), 'link' => '#', 'select' => 'selected'),
);

$this->renderPartial('side_bar', array(
    'list' => $list,
));

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'insert_company-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<div class="content">
    <div class="tabcontents">
        <div class="_100" style="border: 1px solid red; padding: 10px 5px; color: red; font-weight: bold; background-color: pink; text-align: center;">
            <?php echo Yii::t('language', 'ตั้งค่าร้านค้าที่ไม่มีการอัพเดตของข้อมูล เพื่อเตือนต่อผู้เป็นเจ้าของร้าน'); ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'amount');
            echo $form->textField($model, 'amount');
            echo $form->error($model, 'amount');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'type');
            echo $form->dropDownList($model, 'type', array('Day' => Yii::t('language', 'วัน'), 'Month' => Yii::t('language', 'เดือน'), 'Year' => Yii::t('language', 'ปี')), array(
                'empty' => Yii::t('language', 'เลือก')
            ));
            echo $form->error($model, 'type');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'use');
            echo $form->radioButtonList($model, 'use', array('0' => Yii::t('language', 'ไม่เลือกใช้'), '1' => Yii::t('language', 'เลือกใช้งาน')), array(
                'empty' => Yii::t('language', 'เลือก')
            ));
            echo $form->error($model, 'use');
            ?>
        </div>
        <div class='textcenter'>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>