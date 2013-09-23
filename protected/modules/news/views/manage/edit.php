<?php
$this->renderPartial('_side_menu', array('manage' => '1'));
?>

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
                <i class="icon-bell-alt"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/default/index/view/1")); ?>">
                    <?php echo Yii::t('language', 'ข่าว'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/manage/index")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ข่าว'); ?>
                </a>               
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . trim(Yii::t('language', 'ข่าว')); ?>
            </span>
        </h3>
        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'update-form',
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
//            echo $form->errorSummary($model);
            ?>
            <div>
                <?php
                $field = LanguageHelper::changeDB('name_th', 'name_en');
                echo $form->labelEx($model, 'group_id');
                echo $form->DropDownList($model, 'group_id', CHtml::listData(NewsGroup::model()->findAll(), "id", $field)
                        , array('empty' => '- ' . Yii::t('language', 'กรุณาเลือกกลุ่มข่าว') . ' -', 'class' => 'fieldrequire'));
                echo $form->error($model, 'group_id');
                ?>
            </div>
            <!--เลือกรูปภาพ-->
            <div style="padding: 15px 0px;">
                <?php
                echo $form->labelEx($model, 'pic');
//                    echo "<label>" . Yii::t('language', 'แนบไฟล์') . "</label>";
                $this->widget('CMultiFileUpload', array(
                    'model' => $model,
                    'attribute' => 'pic',
                    'name' => 'link_file',
                    'accept' => 'jpg|jpeg|gif|png',
                    'denied' => Yii::t('language', 'allowed_img'),
                    'max' => 1,
                    'remove' => '[x]',
                    'duplicate' => Yii::t('language', 'เลือกไว้แล้ว'),
                        )
                );
//                echo Yii::t('language', $form->error($model, 'pic'));
                ?>
                <div>
                    <div class="file_old clearfix">                                       
                        <?php
                        if ($model->pic != NULL) {
                            echo "<ul class='list_files'> ";
                            $arr_file_detail = explode('.', $model->pic);

                            $arr_file_name = explode('/upload/img/news/', $model->pic);

                            echo "<li class='link_img'>" . CHtml::link($arr_file_name[1], $model->pic, array('target' => '_blank')) . "</li>";
                            echo " </ul>";
                        }
                        ?>
                    </div>
                    <div class="descAttach">
                        <?php echo Yii::t('language', 'ไฟล์แนบ') . ' ' . Yii::t('language', 'ได้แก่'); ?> .jpg, .jpeg, .png, .gif
                        <?php echo '(' . Yii::t('language', 'ขนาดไม่เกิน') . ' 10 MB) ' . Yii::t('language', 'ชื่อไฟล์เป็นภาษาอังกฤษเท่านั้น'); ?>
                    </div>
                    <?php //echo Yii::t('language', $form->error($model_files, 'file_name')); ?>
                </div>
            </div>
            <!--END เลือกรูปภาพ-->

            <!--เลือกแนบไฟล์-->
            <div style="padding: 15px 0px;">
                <?php
//            echo $form->labelEx($model, 'file');
                echo "<label>" . Yii::t('language', 'ไฟล์แนบ') . "</label>";
                $this->widget('CMultiFileUpload', array(
//                'model' => $model,
//                'attribute' => 'file_path',
                    'name' => 'file_path',
//                'accept' => 'jpg|jpeg|gif|png',
//                'denied' => Yii::t('language', 'allowed_img'),
                    'max' => 1,
                    'remove' => '[x]',
                    'duplicate' => Yii::t('language', 'เลือกไว้แล้ว'),
                        )
                );
//                    echo Yii::t('language', $form->error($model, 'pic'));
                ?>
                <div>

                    <?php
                    if (isset($model->id)) {
                        $model_news_file = NewsFile::model()->findAll("news_id=" . $model->id);
                        if (isset($model_news_file)) {
                            echo "<div class='file_old clearfix'>";
                            echo "<ul class='list_files'> ";
//                        $arr_file_detail = explode('.', $model_news_file->file_name);
//
//                        $arr_file_name = explode('/upload/file/news/', $model_news_file->file_path);

                            foreach ($model_news_file as $k => $m) {
                                echo "<li class='link_img'>";
                                echo CHtml::link($m->file_name, $m->file_path, array('target' => '_blank'));
                                echo "</li>";
                            }

                            echo "</ul>";
                            echo "</div>";
                        }
                    }//end  isset($model->id)
                    ?>

                    <div class="descAttach">
                        <?php echo Yii::t('language', 'ไฟล์แนบ') . ' ' . Yii::t('language', 'ได้แก่'); ?> .jpg, .jpeg, .png, .gif
                        <?php echo '(' . Yii::t('language', 'ขนาดไม่เกิน') . ' 10 MB) ' . Yii::t('language', 'ชื่อไฟล์เป็นภาษาอังกฤษเท่านั้น'); ?>
                    </div>
                    <?php //echo Yii::t('language', $form->error($model_files, 'file_name')); ?>
                </div>
            </div>
            <!--END เลือกแนบไฟล์-->
            <?php
//    ภาษาไทย
            echo "<h4 class='reg'> - " . Yii::t('language', 'ภาษาไทย') . " - </h4>";
            echo $form->labelEx($model, 'subject_th');
            echo $form->textField($model, 'subject_th', array('class' => 'fieldrequire'));
            echo $form->error($model, 'subject_th');

            echo $form->labelEx($model, 'detail_th');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'detail_th', # Attribute in the Data-Model
                "defaultValue" => $model->detail_th, # Optional
                "config" => array(
                    "height" => "240px",
                    "width" => "100%",
                    'toolbar' => array(
                        array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
                            '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                            '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
                        array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
                            '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                            '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About'),
                    ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
                ),
                "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
                # Path to ckeditor.php
                "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
            ));
            echo $form->error($model, 'detail_th');

//    ภาษาอังกฤษ
            echo "<h4 class='reg'> - " . Yii::t('language', 'ภาษาอังกฤษ') . " - </h4>";
            echo $form->labelEx($model, 'subject_en');
            echo $form->textField($model, 'subject_en', array('class' => 'fieldrequire'));
            echo $form->error($model, 'subject_en');

            echo $form->labelEx($model, 'detail_en');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'detail_en', # Attribute in the Data-Model
                "defaultValue" => $model->detail_en, # Optional
                "config" => array(
                    "height" => "240px",
                    "width" => "100%",
                    'toolbar' => array(
                        array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
                            '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                            '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
                        array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
                            '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                            '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About'),
                    ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
                ),
                "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
                # Path to ckeditor.php
                "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
            ));
            echo $form->error($model, 'detail_en');
            ?>

            <div class='txt-cen'>
                <hr>
                <?php
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/index")) . '"'));
                ?>
                <hr>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>