<?php
$list = array(
    array('text' => Yii::t('language', 'ร้านค้าทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
    array('text' => Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'), 'link' => '/eDirectory/admin/companyWaiting', 'select' => ''),
    array('text' => Yii::t('language', 'ร้านค้า'), 'link' => '#', 'select' => 'selected'),
    array('text' => Yii::t('language', 'ความเคลื่อนไหว'), 'link' => '/eDirectory/admin/motionSetting', 'select' => ''),
);

$this->renderPartial('side_bar', array(
    'list' => $list,
))
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
            <div class="_100">
                <?php
                echo $form->labelEx($model_type, 'company_type');
                echo $form->checkBoxList($model_type, 'company_type', SpTypeBusiness::model()->getDataList());
                echo $form->error($model_type, 'company_type');
                ?>
            </div>
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
                echo $form->textArea($model, 'infor');
                echo $form->error($model, 'infor');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'main_business');
                echo $form->textfield($model, 'main_business');
                echo $form->error($model, 'main_business');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'sub_business');
                echo $form->textArea($model, 'sub_business');
                echo $form->error($model, 'sub_business');
                ?>
            </div>
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
                echo $form->textArea($model, 'infor_en');
                echo $form->error($model, 'infor_en');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'main_business_en');
                echo $form->textfield($model, 'main_business_en');
                echo $form->error($model, 'main_business_en');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'sub_business_en');
                echo $form->textArea($model, 'sub_business_en');
                echo $form->error($model, 'sub_business_en');
                ?>
            </div>
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
                <h4 class="reg"><?php echo Yii::t('language', '- เอกสารอิเล็กทรอนิกส์ -'); ?></h4>
            </div>
            <div class="_100">
                <div class="_50">
                    <?php
                    echo $form->labelEx($model, 'logo');
                    $this->widget('CMultiFileUpload', array(
                        'name' => 'logo',
                        'accept' => 'png|jpg|gif|bmp|tif|jpeg',
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
                        'accept' => 'png|jpg|gif|bmp|tif|jpeg',
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
                                '/eDirectory/admin/delBanner'
                                    ), array(
                                'type' => 'post',
                                'data' => array('banner_id' => $data['company_banner_id'], 'company_id' => $model->id),
                                'update' => 'div#banner',
                                    ), array(
//                                'onClick' => 'return confirm("คุณต้องการลบรูปภาพหรือไม่?")',
                                'hrel' => '/eDirectory/admin/delBanner', 'id' => $data['company_banner_id']
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
                                '/eDirectory/admin/delBrochure'
                                    ), array(
                                'type' => 'post',
                                'data' => array('brochure_id' => $data['company_brochure_id'], 'company_id' => $model->id),
                                'update' => 'div#brochure',
                                    ), array(
//                                'onClick' => 'return confirm("คุณต้องการลบโบว์ชัวร์หรือไม่?")',
                                'hrel' => '/eDirectory/admin/delBrochure', 'id' => $data['company_brochure_id']
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
                if (Yii::app()->user->getState('default_link_back_to_menu')) {
                    $link_back = Yii::app()->user->getState('default_link_back_to_menu');

                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            $link_back
                        )) . "'")
                    );
                } else {
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/serviceProvider/manage/company'
                        )) . "'")
                    );
                }
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>