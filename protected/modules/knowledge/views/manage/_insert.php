<?php
if ($model->id != NULL) {
    $btnText = 'แก้ไขบทความ';
} else {
    $btnText = 'เพิ่มบทความ';
}
?>

<div class="_100">
    <h3>  <i class="icon-plus"></i> <?php echo $btnText; ?></h3>
</div>


<hr>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'insert_knowledge-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <div class="_100">
        <h4 class="reg"><?php echo Yii::t('language', '- บทความภาษาไทย -'); ?></h4>
    </div>
    <div class="_100">
        <div class="ckleft">
            <?php
            echo $form->label($model, 'subject');
            ?>

        </div>
        <div class="ckright">
            <?php
            echo $form->textField($model, 'subject');
            echo $form->error($model, 'subject')
            ?>
        </div>
    </div>
    <div class="_100">

        <div class="ckleft">
            <?php   echo $form->label($model, 'detail');?>
        </div> <div class="ckright">
        <?php


        $this->widget('ext.ckeditor.CKEditorWidget', array(
"model" => $model, # Data-Model
"attribute" => 'detail', # Attribute in the Data-Model  // textarea name=""
"defaultValue" => $model->detail, # Optional
"config" => array(
    "resize_dir" => "vertical",
    "height" => "240px",
    "width" => "100%",
    'toolbar' => array(
        array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
            '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
            '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
        array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
            '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
            '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About',),
), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
    ),
"ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
# Path to ckeditor.php
"ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
));
echo $form->error($model, 'detail');
?>
</div>
</div>
<div class="_100">
    <h4 class="reg"><?php echo Yii::t('language', '- บทความภาษาอังกฤษ -'); ?></h4>
</div>


<div class="_100">
    <div class="ckleft">
        <?php   echo $form->label($model, 'subject_en');  ?>
    </div>

    <div class="ckright">
        <?php
        echo $form->textField($model, 'subject_en');
        echo $form->error($model, 'subject_en')
        ?>
    </div>
</div>

<div class="_100">

    <div class="ckleft">
        <?php echo $form->label($model, 'detail_en'); ?>
    </div>
    <div class="ckright">
        <?php

        $this->widget('ext.ckeditor.CKEditorWidget', array(
"model" => $model, # Data-Model
"attribute" => 'detail_en', # Attribute in the Data-Model  // textarea name=""
"defaultValue" => $model->detail_en, # Optional
"config" => array(
    "resize_dir" => "vertical",
    "height" => "240px",
    "width" => "100%",
    'toolbar' => array(
        array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
            '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
            '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
        array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
            '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
            '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About',),
), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
    ),
"ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
# Path to ckeditor.php
"ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
));
echo $form->error($model, 'detail_en');
?>
</div>
</div>
<div class="_100">
    
        <div class="ckleft">
            <?php
            echo $form->label($model, 'guide_status');
            ?>
        </div>

        <div class="ckright">
            <?php
            echo $form->radioButtonList($model, 'guide_status', array('0' => 'ไม่เลือก', '1' => 'เลือก'), array());
            ?>
        </div>
    
</div>
<div class="_100">
       <div class="ckleft"> 
            <?php  echo CHtml::label('รูปภาพเก่า', false); ?>
        </div>
        <div class="ckright">
            <?php
            if (!empty($model->image)) {
                ?>
                <?php
                echo CHtml::image("/file/knowledge/" . $model->image, "image", array('height' => '100'));
                echo CHtml::label($model->image, false, array('class' => 'hidden'));
                ?>
                <?php
            }
            ?> 
        </div>
</div>

<div class="_100"> 
                    <div class="ckleft">

                        <?php
                        if (empty($model->image)) {
                            echo $form->labelEx($model, 'image');
                        } else {
                            echo $form->labelEx($file, 'image');
                        }
                        ?>
               
                    </div>
                    <div class="ckright">   
                        <?
                        echo $form->fileField($file, 'image', array('accept' => 'imaage/*'));
                        echo $form->error($file, 'image');
                        ?>
                    </div>
 </div>
          


<div class="_100 textcenter">
    <?php
    echo CHtml::submitButton($btnText);
    echo CHtml::button('ยกเลิก', array('onClick' => "history.go(-1)")
        );
        ?>
</div>
    <?php $this->endWidget(); ?>

