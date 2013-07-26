<?php
if (empty($model->id)) {
    $btnText = 'เพิ่มสินค้า';

    $link_back = '/serviceProvider/manage/typeBusiness';
} else {
    $btnText = 'แก้ไขสินค้า';

    $link_back = '/serviceProvider/manage/typeBusiness';
}
?>
<h3>  <i class="icon-plus"></i> <?php echo $btnText; ?></h3>

<hr>
<div class="_100">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'insert_type_business-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <div class="_100">
        <h4 class="reg"><?php echo Yii::t('language', '- ข้อมูลสินค้าภาษาไทย -'); ?></h4>
    </div>
    <div class="_100">
        <?php
        echo $form->label($model, 'name');
        echo $form->textfield($model, 'name');
        echo $form->error($model, 'name');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->label($model, 'detail');
        echo $form->textArea($model, 'detail');
        echo $form->error($model, 'detail');
        ?>
    </div>
    <div class="_100">
        <h4 class="reg"><?php echo Yii::t('language', '- ข้อมูลสินค้าภาษาอังกฤษ -'); ?></h4>
    </div>
    <div class="_100">
        <?php
        echo $form->label($model, 'name_en');
        echo $form->textfield($model, 'name_en');
        echo $form->error($model, 'name_en');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->label($model, 'detail_en');
        echo $form->textArea($model, 'detail_en');
        echo $form->error($model, 'detail_en');
        ?>
    </div>
    <div class="_100 textcenter">
        <?php
        echo CHtml::submitButton($btnText);
//        echo CHtml::button('ยกเลิก', array('onClick' => "history.go(-1)")
//        );
        echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/serviceProvider/manage/product'
            )) . "'")
        );
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>