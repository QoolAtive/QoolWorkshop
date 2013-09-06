<?php
$this->renderPartial('_sidebar', array(
    'selectDes' => 'selected',
));
if ($model->description_id != NULL) {
    $btnText = 'แก้ไข';
} else {
    $btnText = 'เพิ่ม';
}
?>

<style>
    textArea{
        height: 100px;
    }
</style>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-cog"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
                    <?php echo Yii::t('language', 'ตั้งค่าเว็บไซต์'); ?>
                </a> 
                <i class="icon-chevron-right"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/titleWeb")); ?>">
                    <?php echo Yii::t('language', 'รายละเอียด'); ?>
                </a> 
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', $btnText) . ' ' . Yii::t('language', 'รายละเอียด'); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'description_insert-form',
            'focus' => array($model, 'detail'),
        ));
        ?>
        <div class="_100">
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'detail');
                echo $form->textArea($model, 'detail');
                echo $form->error($model, 'detail')
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'detail_en');
                echo $form->textArea($model, 'detail_en');
                echo $form->error($model, 'detail_en')
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'status') . "<br />";
                echo $form->dropDownList($model, 'status', TitleWeb::model()->getStatus(), array('style' => 'width: 150px;'));
                echo $form->error($model, 'status')
                ?>
            </div>
            <div class="_100" style="text-align: center;">
                <hr>
                <?php
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/dataCenter/default/description'
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
