<?php
$this->renderPartial('_sidebar', array(
    'selectEdu' => 'selected',
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
                <a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/highEducation")); ?>">
                    <?php echo Yii::t('language', 'ระดับการศึกษา'); ?>
                </a> 
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', $btnText) . Yii::t('language', 'ระดับการศึกษา'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert_high_education-form',
        ));
        ?>
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'name');
            echo $form->textField($model, 'name');
            echo $form->error($model, 'name')
            ?>
        </div>

        <div class="_50">
            <?php
            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en');
            echo $form->error($model, 'name_en')
            ?>
        </div>


        <div class="_50">
            <?php
            echo $form->labelEx($model, 'abbreviation');
            echo $form->textField($model, 'abbreviation');
            echo $form->error($model, 'abbreviation')
            ?>
        </div>
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'abbreviation_en');
            echo $form->textField($model, 'abbreviation_en');
            echo $form->error($model, 'abbreviation_en')
            ?>
        </div>

        <div class="_100 textcenter">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/highEducation'
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
