<?php
if ($model->id != NULL) {
    $btnText = 'แก้ไข';
} else {
    $btnText = 'เพิ่ม';
}
?>
<div class="manageform">
    <h3>  <i class="icon-plus"></i> <?php echo $btnText; ?>บทความ</h3>
    <hr>
    <ul class="form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert-form',
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>
        <?php echo $form->errorSummary(array($model, $file)); ?>

        <li>
            <?php 
            echo $form->label($model, 'subject');
            echo $form->textField($model, 'subject'); 
            echo $form->error($model, 'subject')
            ?>
        </li>

        <li>
            <?php
            echo $form->label($model, 'detail');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'detail', # Attribute in the Data-Model  // textarea name=""
                "defaultValue" => $model->detail, # Optional
                "config" => array(
                    "resize_dir" => "vertical",
                    "height" => "240px",
                    "width" => "784",
                    'toolbar' => array(
                        array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
                            '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                            '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
                        array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
                            '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                            '-', 'Source', '-', 'About','Link'),
                    ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
                ),
                "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
                # Path to ckeditor.php
                "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
            ));
            echo $form->error($model, 'detail');
            ?>
        </li>
        <li class="radiofix">
            <?php
            echo $form->label($model, 'guide_status');
            echo $form->radioButtonList($model, 'guide_status', array('0' => 'ไม่เลือก', '1' => 'เลือก'), array());
            ?>

        </li>
        <?php
        if (!empty($model->image)) {
            ?>
            <li>
                <?php
                echo CHtml::label('รูปภาพเก่า', false);
                echo CHtml::image("/file/knowledge/" . $model->image, "image", array('height' => '100'));
                echo CHtml::label($model->image, false, array('class' => 'hidden'));
                ?>
            </li>
            <?php
        }
        ?>
        <li>
            <?php
            if (empty($model->image)) {
                echo $form->labelEx($model, 'image');
            } else {
                echo $form->labelEx($file, 'image');
            }
            ?>

            <!-- 
            Browse File http://jsfiddle.net/Tdkre/1/
            <div id="FileUpload">
                <input type="file" size="24" id="BrowserHidden" onchange="getElementById('FileField').value = getElementById('BrowserHidden').value;" />
                
                <div id="BrowserVisible">
                    <input type="text" id="FileField" />
                </div>
            </div> 
            -->
            <?
            echo $form->fileField($file, 'image');
            echo $form->error($file, 'image');
            ?>



        </li>

        <li class="textcenter">
            <?php
            // บันทึก
            // echo CHtml::submitButton($btnText ,array('class' => 'knowledgeedit fancybox.iframe'));
            echo CHtml::submitButton($btnText);


//            if ($model->id == NULL) { 
//            echo CHtml::button('ยกเลิก', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
//                    Yii::app()->user->getState('cancel')
//                )) . "'")
//            );
            echo CHtml::button('ยกเลิก', array('onClick' => "history.go(-1)")
            );
//            } else {
//                echo CHtml::button('ยกเลิก', array('class' => "grey",'onClick' => "window.location='" . CHtml::normalizeUrl(array(
//                        '/knowledge/manage/delReview/id/' . $model->id,
//                    )) . "'")
//                );
//            }
            ?>

        </li>

        <?php $this->endWidget(); ?>
    </ul>

</div>
