<?php
$this->renderPartial('_sidebar', array(
    'selectKey' => 'selected',
));

if ($model->keyword_id != NULL) {
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
                <a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/keyword")); ?>">
                    <?php echo Yii::t('language', 'คำสำคัญ'); ?>
                </a> 
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', $btnText) . Yii::t('language', 'คำสำคัญ'); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'keyword_insert-form',
            'focus' => array($model, 'name'),
        ));
        ?>
        <div class="_100">
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'name');
                echo $form->textField($model, 'name');
                echo $form->error($model, 'name')
                ?>
            </div>
            <div class="_100" style="text-align: center;">
                <hr>
                <?php
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/dataCenter/default/keyword'
                    )) . "'")
                );
                ?>
                <hr>
            </div>
        </div>
        <?php
        $this->endWidget();
        ?>

    </div>
</div>
