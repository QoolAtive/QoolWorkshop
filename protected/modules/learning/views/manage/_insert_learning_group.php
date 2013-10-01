<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'learning_group-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    ),
        )
);
if ($model->id == null) {
    $word = Yii::t('language', 'เพิ่ม');
} else {
    $word = Yii::t('language', 'แก้ไข');
}
?>
<?php
$this->renderPartial('_side_bar', array(
    'select_list' => 1,
));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-bookmark-empty"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/learning/default/home")); ?>">
                    <?php echo Yii::t('language', 'การเรียนรู้'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="/learning/manage/learning">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'การเรียนรู้'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="/learning/manage/learning">
                    <?php echo Yii::t('language', 'กลุ่มการเรียนรู้'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo $word . Yii::t('language', 'กลุ่มการเรียนรู้'); ?>
            </span>
        </h3>


        <div class="_50">

            <div class="_100">
                <h4 class="reg"><?php echo '- ' . Yii::t('language', 'กลุ่มการเรียนรู้') . ' (' . Yii::t('language', 'ภาษาไทย') . ') -'; ?></h4>
            </div>

            <div class="_100">
                <?php
                echo $form->labelEx($model, 'name');
                echo $form->textField($model, 'name', array('class' => 'fieldrequire'));
                echo $form->error($model, 'name');
                ?>
            </div>
            <?php if (!empty($model->pic)) { ?>
                <div class="_100">
                    <label><?php echo Yii::t('language', 'รูปภาพเดิม') . ' (' . Yii::t('language', 'ภาษาไทย') . ')'; ?> : </label>
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

        </div>


        <div class="_50">

            <div class="_100">
                <h4 class="reg"><?php echo '- ' . Yii::t('language', 'กลุ่มการเรียนรู้') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ') -'; ?></h4>
            </div>

            <div class="_100">
                <?php
                echo $form->labelEx($model, 'name_en');
                echo $form->textField($model, 'name_en', array('class' => 'fieldrequire'));
                echo $form->error($model, 'name_en');
                ?>
            </div>
            <?php if (!empty($model->pic_en)) { ?>
                <div class="_100">
                    <label><?php echo Yii::t('language', 'รูปภาพเดิม') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ')'; ?> : </label>
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

        </div>
        <div class="_100 txt-cen">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/learning/manage/learningGroup'
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