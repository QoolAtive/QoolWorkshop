

<div class="content">
    <?php
    if ($model->id == NULL) {
        ?>
        <h3><?php echo Yii::t('language', 'เพิ่มกลุ่มข่าว'); ?></h3>
    <?php } else { ?>
        <h3><?php echo Yii::t('language', 'แก้ไขกลุ่มข่าว'); ?></h3>
    <?php } ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'update-form',
    ));
    echo $form->errorSummary($model);
    ?>

    <?php
//    ภาษาไทย
    echo "<h4>" . Yii::t('language', 'ภาษาไทย') . "</h4>";
    echo Yii::t('language', $form->labelEx($model, 'name_th'));
    echo $form->textField($model, 'name_th');

//    ภาษาอังกฤษ
    echo "<h4>" . Yii::t('language', 'ภาษาอังกฤษ') . "</h4>";
    echo Yii::t('language', $form->labelEx($model, 'name_en'));
    echo $form->textField($model, 'name_en');

    echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
    echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/manageGroup")) . '"'));
    ?>
    <?php $this->endWidget(); ?>
</div>