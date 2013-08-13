<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li>
                <a href="/knowledge/default/index" rel="view-1">
                    <?php echo Yii::t('language', 'บทความ'); ?>
                </a>
            </li>
            <li>
                <a href="/learning/default/home"  rel="view-2">
                    <?php echo Yii::t('language', 'การเรียนรู้'); ?>
                </a>
            </li>
            <li class="selected">
                <a href="/knowledge/manage/knowledge" rel="manage-1">
                    <?php echo Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'บทความ'); ?>
                </a>
            </li>
            <li>
                <a href="/learning/manage/learning" rel="manage-2">
                    <?php echo Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'การเรียนรู้'); ?>
                </a>
            </li>

            <?php
//            $list = array(
//                array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '/knowledge/manage/knowledge', 'select' => 'selected'),
////                array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '/knowledge/manage/knowledgeAll', 'select' => ''),
//            );
//            echo Tool::GenList($list);
            ?> 

        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <?php
        if ($model->id == NULL) {
            $word = 'เพิ่ม';
        } else {
            $word = 'แก้ไข';
        }
        ?>
        <h3 class="barH3">
            <span>
                <i class='icon-lightbulb'></i>                
                <a href="<?php echo CHtml::normalizeUrl(array("/knowledge/default/knowledge")); ?>">
                    <?php echo Yii::t('language', 'บทความทั้งหมด'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/knowledge/manage/knowledge")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'บทความ'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . trim(Yii::t('language', 'บทความ')); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert_knowledge-form',
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>
        <div class="_100">
            <h4 class="reg"><?php echo "- " . Yii::t('language', 'บทความภาษาไทย') . " -"; ?></h4>
        </div>
        <div class="_100">
            <div class="ckleft">
                <?php
                echo $form->label($model, 'guide_status');
                ?>
            </div>
            <div class="ckright">
                <?php
                echo $form->radioButtonList($model, 'guide_status', array('0' => Yii::t('language', 'ไม่เลือก'), '1' => Yii::t('language', 'เลือก')), array());
                ?>
            </div>
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
                <?php echo $form->label($model, 'detail'); ?>
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
            <h4 class="reg"><?php echo "- " . Yii::t('language', 'บทความภาษาอังกฤษ') . " -"; ?></h4>
        </div>


        <div class="_100">
            <div class="ckleft">
                <?php echo $form->label($model, 'subject_en'); ?>
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
                <?php echo CHtml::label(Yii::t('language', 'รูปภาพเดิม'), false); ?>
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
                <?php
                echo $form->fileField($file, 'image', array('accept' => 'imaage/*'));
                echo $form->error($file, 'image');
                ?>
            </div>
        </div>
        <div class="txt-cen">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onClick' => "history.go(-1)")
            );
            ?>
            <hr>
        </div>
        <?php $this->endWidget(); ?>

    </div>
</div>