<?php
//$list = array(
//    array('text' => Yii::t('language', 'ร้านค้าทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
//    array('text' => Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'), 'link' => '/eDirectory/admin/companyWaiting', 'select' => ''),
//    array('text' => Yii::t('language', 'ร้านค้า'), 'link' => '#', 'select' => 'selected'),
//    array('text' => Yii::t('language', 'ความเคลื่อนไหว'), 'link' => '/eDirectory/admin/motionSetting', 'select' => ''),
//);

$this->renderPartial('side_bar', array(
    'active' => 1,
));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-home"></i>
                <?php
                echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'), array('/eDirectory/admin/index'));
                ?>
                <i class="icon-chevron-right"></i>
                <?php echo CHtml::link(Yii::t('language', 'ร้านค้าทั้งหมด'), array('/eDirectory/admin/index')); ?>                
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'อัพโหลด') . trim(Yii::t('language', 'ร้านค้า')); ?>   
            </span>
        </h3>
        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'company_upload-form',
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>
            <div class="clearfix" style="padding: 0px 50px; text-align: center;">
                <div style="width: 48%; float: left;">
                    <label class="required" for="CompanyUpload_file">
                        <?php echo Yii::t('language', 'ไฟล์'); ?>
                        <span class="required">*</span>
                    </label>
                    <?php
//                    echo $form->labelEx($model, 'file');
                    echo $form->fileField($model, 'file');
                    echo $form->error($model, 'file');
                    ?>                    
                </div>
                <div>
                    <?php
                    echo CHtml::link(Yii::t('language', 'ดาวน์โหลดแบบฟอร์ม'), array('/eDirectory/default/readingFile', 'id' => null, 'type' => 'companyXLS'));
                    ?>
                </div>
            </div>
            <div class="textcenter">
                <hr>
                <?php
                echo CHtml::submitButton(Yii::t('language', 'อัพโหลด'));
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/eDirectory/admin/index'
                    )) . "'")
                );
                ?>  
                <hr>
            </div>
            <div class="clearfix"></div>
            <?php if ($errorTable != null) { ?>
                <div class='clearfix' style="border: 1px solid blueviolet; padding: 5px; margin: 10px 0px;">
                    <?php echo $errorTable; ?>
                </div>
            <?php } ?>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>