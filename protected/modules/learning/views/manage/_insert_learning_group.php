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
    <h3>กลุ่มการเรียนรู้</h3>
    <div class="_100">
        <h4 class="reg"><?php echo Yii::t('language', '- กลุ่มการเรียนรู้ภาษาไทย -'); ?></h4>
    </div>
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
        <h4 class="reg"><?php echo Yii::t('language', '- กลุ่มการเรียนรู้ภาษาอังกฤษ -'); ?></h4>
    </div>
    <?php if ($model->pic_en) { ?>
        <div class="_100">
            <label>รูปเก่า : </label>
            <?php
            echo CHtml::image('/file/learning/' . $model->pic_en, $alt, array('height' => '150px'))
            ?>
        </div>
    <?php } ?>
    <div class="_100">
        <?php
        echo $form->labelEx($file, 'image2');
        echo $form->fileField($file, 'image2');
        echo $form->error($file, 'image2');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->labelEx($model, 'name_en');
        echo $form->textField($model, 'name_en');
        echo $form->error($model, 'name_en');
        ?>
    </div>
    <div class="_100">
        <?php
        echo CHtml::submitButton(Yii::t('language', 'เพิ่มกลุ่มการเรียนรู้'));
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
