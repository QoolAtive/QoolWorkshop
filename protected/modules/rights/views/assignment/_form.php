<div class="form">

    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <div class="row">
        <?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions); ?>
        <?php echo $form->error($model, 'itemname'); ?>
    </div>

    <div class="row buttons txt-cen">
        <hr>
        <?php echo CHtml::submitButton(Rights::t('core', 'กำหนด')); ?>
        <hr>
    </div>

    <?php $this->endWidget(); ?>

</div>