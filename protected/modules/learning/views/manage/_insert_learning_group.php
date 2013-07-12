<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'learning_group-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    ),
        )
);
?>
<div>
    <h3>เพิ่มกลุ่มบทเรียน</h3>
    <?php if ($model->pic) { ?>
        <div class="_100">
            <label>รูปเก่า : </label>
            <?php
            echo CHtml::image('/file/learning/' . $model->pic, $alt, array('height' => '150px'))
            ?>
        </div>
    <?php } ?>
    <div class="_100">
        <?php
        echo $form->labelEx($file, 'image');
        echo $form->fileField($file, 'image');
        echo $form->error($file, 'image');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->labelEx($model, 'name');
        echo $form->textField($model, 'name');
        echo $form->error($model, 'name');
        ?>
    </div>
    <div class="_100">
        <?php
        echo CHtml::submitButton(Yii::t('language', 'เพิ่มกลุ่มบทเรียนรู้'));
        echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/learning/manage/learningGroup'
            )) . "'")
        );
        ?>
    </div>
</div>
<?php
$this->endWidget();
?>
