<script type="text/javascript">
    $(document).ready(function() {

        $("#option1").hide();
        if ($("#DelivSer_delivery_id_0").is(":checked")) { // มีข้อมูล
            $("#option1").show();
            $("#inLocal").hide();
            $("#other").hide();
            $("#other2").hide();
            if ($("#DelivSer_option_0").is(":checked")) { // ในประเทศ
                $("#inLocal").show();
                if ($("#DelivSer_option2_1").is(":checked")) { // บางพื้นที่
                    $("#other").show();
                }
            }
            if ($("#DelivSer_option_1").is(":checked")) { // ต่างประเทศ
                $("#other2").show();
//                $("#other").hide();
            }
        }
        if ($("#DelivSer_delivery_id_1").is(":checked")) {
            $("#option1").hide();
        }


        $("#DelivSer_delivery_id_0").click(function() {
            $("#option1").show();
            $("#other2").hide();
//            $("#DelivSer_option_0").value() = null;
            if ($("#DelivSer_option_0").is(":checked")) {
                $("#inLocal").show();
            }

        });
        $("#DelivSer_delivery_id_1").click(function() {
            $("#option1").hide();

        });

        //ในประเทศ และ ต่างประเทศ
        $("#DelivSer_option_0").click(function() {
            if ($("#DelivSer_option_0").is(":checked")) {
                $("#inLocal").show();
//            $("#other2").hide();
                if ($("#DelivSer_option2_1").is(":checked")) {
                    $("#other").show();
                }
            } else {
                $("#inLocal").hide();
                $("#other").hide();
            }
            //ทั่วประเทศ และ บางพื้นที่


        });

        $("#DelivSer_option2_0").click(function() {
            if ($("#DelivSer_option2_0").is(":checked")) {
                $("#other").hide();
//                $("#other2").hide();
            }
        });
        $("#DelivSer_option2_1").click(function() {
            if ($("#DelivSer_option2_1").is(":checked")) {
                $("#other").show();
            }
        });

        $("#DelivSer_option_1").click(function() { // เลือกการส่งแบบต่างประเทศ
            if ($("#DelivSer_option_1").is(":checked")) {
                $("#other2").show();
//            $("#other").hide();
//            $("#inLocal").hide();
            } else {
                $("#other2").hide();
            }
        });
    });
</script>
<?php
$list = array(
    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '/eDirectory/manage/index', 'select' => ''),
    array('text' => Yii::t('language', 'ร้านค้า'), 'link' => '#', 'select' => 'selected'),
);
$this->renderPartial('side_bar', array(
    'list' => $list,
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        if (empty($model->id)) {
            $btnText = 'บันทึก';

            $link_back = '/serviceProvider/manage/typeBusiness';
        } else {
            $btnText = 'บันทึก';

            $link_back = '/serviceProvider/manage/typeBusiness';
        }
        ?>
        <h3>  <i class="icon-plus"></i> <?php echo Yii::t('language', 'ร้านค้า'); ?></h3>

        <hr>
        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'insert_company-form',
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            $model_type->company_type = $type_list_data;
            ?>
            <div class="_100">
                <h4 class="reg"><?php echo Yii::t('language', '- เลือกประเภท -'); ?></h4>
            </div>
            <div class="_50">
                <?php
//                echo $form->labelEx($model_type, 'company_type') . "<br />";
//                echo $form->checkBoxList($model_type, 'company_type', CompanyTypeBusiness::model()->getListData());
//                echo $form->error($model_type, 'company_type');
                echo $form->labelEx($model_type, 'company_type') . "<br />";
                echo $form->dropDownList($model_type, 'company_type', CompanySubTypeBusiness::model()->getMultiList(), array(
                    'multiple' => true, 'style' => 'height: 350px;'
                ));
                echo $form->error($model_type, 'company_type');
                ?>
            </div>
            <div class="_50">
                <?php 
//                echo $form->labelEx($model, 'verify') . "<br />";
//                echo $form->checkBox($model, 'verify');
                ?>
            </div>
            <div class="_100">

                <div class="_100">
                    <h4 class="reg"><?php echo Yii::t('language', '- ข้อมูลภาษาไทย -'); ?></h4>
                </div>
                <div class="_100">
                    <?php
                    echo $form->labelEx($model, 'name');
                    echo $form->textfield($model, 'name');
                    echo $form->error($model, 'name');
                    ?>
                </div>
                <div class="_100">
                    <?php
                    echo $form->labelEx($model, 'infor');
//                    echo $form->textArea($model, 'infor');
                    $this->widget('ext.ckeditor.CKEditorWidget', array(
                        "model" => $model, # Data-Model
                        "attribute" => 'infor', # Attribute in the Data-Model
                        "defaultValue" => $model->infor, # Optional
                        "config" => array(
                            "height" => "220px",
                            "width" => "100%",
                            'toolbar' => array(
                                array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
                                    '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                                    '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
                                array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
                                    '-', 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                                    '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About',),
                            ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
                        ),
                        "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
                        # Path to ckeditor.php
                        "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
                    ));
                    echo $form->error($model, 'infor');
                    ?>
                </div>
                <!--<div class="_100">-->
                <?php
//                echo $form->label($model, 'main_business');
//                echo $form->textfield($model, 'main_business');
//                echo $form->error($model, 'main_business');
                ?>
                <!--            </div>
                            <div class="_100">-->
                <?php
//                echo $form->label($model, 'sub_business');
//                echo $form->textArea($model, 'sub_business');
//                echo $form->error($model, 'sub_business');
                ?>
                <!--</div>-->
                <div class="_100">
                    <?php
                    echo $form->labelEx($model, 'address');
                    echo $form->textArea($model, 'address', array('height' => '100'));
                    echo $form->error($model, 'address');
                    ?>
                </div>
                <div class="_50">
                    <?php
                    echo $form->labelEx($model, 'contact_name');
                    echo $form->textfield($model, 'contact_name');
                    echo $form->error($model, 'contact_name');
                    ?>
                </div>
                <div class="_100">
                    <h4 class="reg"><?php echo Yii::t('language', '- ข้อมูลภาษาอังกฤษ -'); ?></h4>
                </div>
                <div class="_100">
                    <?php
                    echo $form->labelEx($model, 'name_en');
                    echo $form->textfield($model, 'name_en');
                    echo $form->error($model, 'name_en');
                    ?>
                </div>
                <div class="_100">
                    <?php
                    echo $form->labelEx($model, 'infor_en');
//                    echo $form->textArea($model, 'infor_en');
                    $this->widget('ext.ckeditor.CKEditorWidget', array(
                        "model" => $model, # Data-Model
                        "attribute" => 'infor_en', # Attribute in the Data-Model
                        "defaultValue" => $model->infor_en, # Optional
                        "config" => array(
                            "height" => "220px",
                            "width" => "100%",
                            'toolbar' => array(
                                array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
                                    '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                                    '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
                                array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
                                    '-', 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                                    '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About',),
                            ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
                        ),
                        "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
                        # Path to ckeditor.php
                        "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
                    ));
                    echo $form->error($model, 'infor_en');
                    ?>
                </div>
                <!--<div class="_100">-->
                <?php
//                echo $form->label($model, 'main_business_en');
//                echo $form->textfield($model, 'main_business_en');
//                echo $form->error($model, 'main_business_en');
                ?>
                <!--            </div>
                            <div class="_100">-->
                <?php
//                echo $form->label($model, 'sub_business_en');
//                echo $form->textArea($model, 'sub_business_en');
//                echo $form->error($model, 'sub_business_en');
                ?>
                <!--</div>-->
                <div class="_100">
                    <?php
                    echo $form->labelEx($model, 'address_en');
                    echo $form->textArea($model, 'address_en', array('height' => '100'));
                    echo $form->error($model, 'address_en');
                    ?>
                </div>
                <div class="_50">
                    <?php
                    echo $form->labelEx($model, 'contact_name_en');
                    echo $form->textfield($model, 'contact_name_en');
                    echo $form->error($model, 'contact_name_en');
                    ?>
                </div>
                <div class="_100">
                    <h4 class="reg"><?php echo Yii::t('language', '- ข้อมูลติดต่อใช้ร่วมกัน -'); ?></h4>
                </div>
                <div class="_50">
                    <?php
                    echo $form->labelEx($model, 'contact_tel');
                    echo $form->textfield($model, 'contact_tel');
                    echo $form->error($model, 'contact_tel');
                    ?>
                </div>
                <div class="_50">
                    <?php
                    echo $form->labelEx($model, 'contact_fax');
                    echo $form->textfield($model, 'contact_fax');
                    echo $form->error($model, 'contact_fax');
                    ?>
                </div>
                <div class="_50">
                    <?php
                    echo $form->labelEx($model, 'contact_email');
                    echo $form->textfield($model, 'contact_email');
                    echo $form->error($model, 'contact_email');
                    ?>
                </div>
                <div class="_50">
                    <?php
                    echo $form->labelEx($model, 'website');
                    echo $form->textfield($model, 'website');
                    echo $form->error($model, 'website');
                    ?>
                </div>
                <div class="_50">
                    <?php
                    echo $form->labelEx($model, 'facebook');
                    echo $form->textfield($model, 'facebook');
                    echo $form->error($model, 'facebook');
                    ?>
                </div>
                <div class="_50">
                    <?php
                    echo $form->labelEx($model, 'twitter');
                    echo $form->textfield($model, 'twitter');
                    echo $form->error($model, 'twitter');
                    ?>
                </div>
                <div class="_100">
                    <h4 class="reg"><?php echo Yii::t('language', '- บริการจัดส่ง -'); ?></h4>
                </div>
                <div class="_100">
                    <?php
                    echo $form->labelEx($model_delivery, 'delivery_id') . "<br />";
                    echo $form->radioButtonList($model_delivery, 'delivery_id', CompanyDelivery::model()->getListData());
                    echo $form->error($model_delivery, 'delivery_id');
                    ?>
                    <div id="option1" class="_100" style="display: none;">
                        <?php
                        $model_delivery->option = $delivery;
                        echo $form->labelEx($model_delivery, 'option') . '<br />';
                        echo $form->checkBoxList($model_delivery, 'option', array('0' => 'ในประเทศ', '1' => 'ต่างประเทศ'));
                        echo $form->error($model_delivery, 'option');
                        ?>

                        <div id="inLocal" class="_100" style="display: none;">
                            <?php
                            echo $form->labelEx($model_delivery, 'option2') . '<br />';
                            echo $form->radioButtonList($model_delivery, 'option2', array('0' => 'ทั่วประเทศ', '1' => 'บางพื้นที่'));
                            echo $form->error($model_delivery, 'option2');
                            ?>

                        </div>
                        <div id="other" class="_100" style="display: none;">
                            <?php
                            echo $form->labelEx($model_delivery, 'other');
                            echo $form->textfield($model_delivery, 'other');
                            echo $form->error($model_delivery, 'other');
                            ?>
                        </div>
                        <div id="other2" class="_100" style="display: none;">
                            <?php
                            echo $form->labelEx($model_delivery, 'other2');
                            echo $form->textfield($model_delivery, 'other2');
                            echo $form->error($model_delivery, 'other2');
                            ?>
                        </div>
                    </div>
                </div>


                <div class="_100">
                    <h4 class="reg"><?php echo Yii::t('language', '- เอกสารอิเล็กทรอนิกส์ -'); ?></h4>
                </div>
                <div class="_100">
                    <div class="_50">
                        <?php
                        echo $form->labelEx($model, 'logo');
                        $this->widget('CMultiFileUpload', array(
                            'name' => 'logo',
                            'accept' => 'png|jpg|gif|bmp|tif|jpeg|swf',
                            'max' => 1,
                            'denied' => Yii::t('language', 'ประเภทไฟล์ไม่ถูกต้อง ลองใหม่อีกครั้ง'),
//            'htmlOptions' => array('size' => 25),
//            'options' => array(
//                'afterFileSelect' => 'function(e, v, m){ alert("afterFileSelect - "+e) }',
//            ),
                        ));
                        ?>
                        <span><?php echo Yii::t('language', 'ประเภทไฟล์ที่ยอมรับ'); ?> (png, jpg, gif, bmp, tif)</span>
                        <span><?php echo Yii::t('language', 'ขนาดภาพที่เหมาะสม'); ?> (227 x 220)</span>
                    </div>
                    <?php
                    if ($model->logo != null) {
                        ?>
                        <div class = "_50">
                            <label><?php echo Yii::t('language', 'โลโก้'); ?></label>
                            <?php
                            echo CHtml::image("/file/logo/" . $model->logo, $model->logo, array('width' => '350'));
//                        echo CHtml::ajaxLink(Yii::t('language', 'ลบ'), array(
//                            '/serviceProvider/manage/delete', 'id' => $model->id
//                                ), array(
//                            'type' => 'post',
//                                ), array(
//                            'hrel' => '/serviceProvider/manage/delete', 'id' => $model->id,
//                                )
//                        );
                            ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="_100">
                    <div class="_50">
                        <?php
                        echo $form->labelEx($model, 'banner');
                        $this->widget('CMultiFileUpload', array(
                            'name' => 'banner',
                            'accept' => 'png|jpg|gif|bmp|tif|jpeg|swf',
                            'max' => 3,
                            'denied' => Yii::t('language', 'ประเภทไฟล์ไม่ถูกต้อง ลองใหม่อีกครั้ง'),
                            'duplicate' => Yii::t('language', 'ไฟล์ได้ถูกเลือกไปแล้ว ลองใหม่อีกครั้ง'),
//            'htmlOptions' => array('size' => 25),
//            'options' => array(
//                'afterFileSelect' => 'function(e, v, m){ alert("afterFileSelect - "+e) }',
//            ),
                        ));
                        ?>
                        <span><?php echo Yii::t('language', 'ประเภทไฟล์ที่ยอมรับ'); ?> (png, jpg, gif, bmp, tif)</span>
                        <span><?php echo Yii::t('language', 'ขนาดภาพที่เหมาะสม'); ?> (525 x 220)</span>
                    </div>
                    <div class="_50" id="banner">
                        <?php
                        $banner = CompanyBanner::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                        if (count($banner) > 0) {
                            ?>
                            <label><?php echo Yii::t('language', 'แบนเนอร์ทั้งหมด'); ?></label>
                            <?php
                            foreach ($banner as $data) {
                                echo CHtml::image("/file/banner/" . $data['path'], "image", array('width' => '350'));
                                echo CHtml::ajaxLink(Yii::t('language', 'ลบ'), array(
                                    '/eDirectory/manage/delBanner'
                                        ), array(
                                    'type' => 'post',
                                    'data' => array('banner_id' => $data['company_banner_id'], 'company_id' => $model->id),
                                    'update' => 'div#banner',
                                        ), array(
//                                'onClick' => 'return confirm("คุณต้องการลบรูปภาพหรือไม่?")',
                                    'hrel' => '/eDirectory/manage/delBanner', 'id' => $data['company_banner_id']
                                        )
                                );
                            }
                            ?>

                        <?php } ?>
                    </div>
                </div>
                <div class="_100">
                    <div class="_50">
                        <?php
                        echo $form->labelEx($model, 'brochure');
                        $this->widget('CMultiFileUpload', array(
                            'name' => 'brochure',
                            'accept' => 'docx|doc|xls|pdf|png|jpg|gif|bmp|tif|jpeg',
                            'max' => 5,
                            'denied' => Yii::t('language', 'ประเภทไฟล์ไม่ถูกต้อง ลองใหม่อีกครั้ง'),
                            'duplicate' => Yii::t('language', 'ไฟล์ได้ถูกเลือกไปแล้ว ลองใหม่อีกครั้ง'),
//            'options' => array(
//                'onFileSelect' => 'function(e, v, m){
//                    if(){
//                    }else{
//                    }
//                    }'
//            ),
                        ));
                        ?>
                        <span><?php echo Yii::t('language', 'ประเภทไฟล์ที่ยอมรับ'); ?> (pdf, png, jpg, gif, bmp, tif)</span>
                    </div>
                    <div class="_50" id='brochure'>
                        <?php
                        $brochure = CompanyBrochure::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                        if (count($brochure) > 0) {
                            ?>
                            <label><?php echo Yii::t('language', 'โบว์ชัวร์'); ?></label>
                            <?php
                            foreach ($brochure as $data) {
                                echo "<ul>";
                                echo "<li>";
                                echo CHtml::link($data['path'], array('/eDirectory/default/readingFile', 'id' => $data['company_brochure_id'], 'type' => 'brochure'));
                                echo "</li>";
                                echo "<li>";
                                echo CHtml::ajaxLink(Yii::t('language', 'ลบ'), array(
                                    '/eDirectory/manage/delBrochure'
                                        ), array(
                                    'type' => 'post',
                                    'data' => array('brochure_id' => $data['company_brochure_id'], 'company_id' => $model->id),
                                    'update' => 'div#brochure',
                                        ), array(
//                                'onClick' => 'return confirm("คุณต้องการลบโบว์ชัวร์หรือไม่?")',
                                    'hrel' => '/eDirectory/manage/delBrochure', 'id' => $data['company_brochure_id']
                                        )
                                );
                                echo "</li>";
                                echo "</ul>";
                            }
                            ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="_100 textcenter">
                    <?php
                    echo CHtml::submitButton($btnText);
//        echo CHtml::button('ยกเลิก', array('onClick' => "history.go(-1)")
//        );
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/eDirectory/manage/index'
                        )) . "'")
                    );
                    ?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
