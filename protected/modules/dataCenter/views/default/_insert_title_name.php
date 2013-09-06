<?php
$this->renderPartial('_sidebar', array(
    'selectTname' => 'selected',
));
if ($model->id != NULL) {
    $btnText = 'แก้ไข';
} else {
    $btnText = 'เพิ่ม';
}
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-cog"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
                    <?php echo Yii::t('language', 'ตั้งค่าเว็บไซต์'); ?>
                </a> 
                <i class="icon-chevron-right"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/titleName")); ?>">
                    <?php echo Yii::t('language', 'คำนำหน้าชื่อ'); ?>
                </a> 
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', $btnText) . Yii::t('language', 'คำนำหน้าชื่อ'); ?>
            </span>
        </h3>   
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert_title_name-form',
        ));
        ?>
        <div class='clearfix'>
            <div class='_50'>
                <?php
                echo $form->label($model, 'name');
                echo $form->textField($model, 'name');
                echo $form->error($model, 'name')
                ?>
            </div>
            <div class='_50'>
                <?php
                echo $form->label($model, 'name_en');
                echo $form->textField($model, 'name_en');
                echo $form->error($model, 'name_en')
                ?>
            </div>
        </div>
        <div class="textcenter">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/titleName'
                )) . "'")
            );
            ?>
            <hr>
        </div>

        <?php
        $this->endWidget();
        ?>
    </div>
</div>
