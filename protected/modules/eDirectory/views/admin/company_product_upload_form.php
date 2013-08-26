<?php
//$list = array(
//    array('text' => Yii::t('language', 'ร้านค้าทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
//    array('text' => Yii::t('language', 'จัดการสินค้าและบริการ'), 'link' => '/eDirectory/admin/product/id/' . $id, 'select' => ''),
//    array('text' => Yii::t('language', 'อัพโหลดสินค้า'), 'link' => '#', 'select' => 'selected'),
//);

$this->renderPartial('side_bar', array(
    'active' => 5,
    'company_id' => $id,
));
$title = Company::model()->find('id=:id', array(':id' => $id));
$company_name = LanguageHelper::changeDB($title->name, $title->name_en);
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
                <?php
                echo CHtml::link(
                        Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าและบริการ') . ' (' . $company_name . ') ', array(
                    '/eDirectory/admin/product/id/' . $id
                ));
                ?>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'อัพโหลด') . trim(Yii::t('language', 'สินค้า')); ?>   
            </span>
        </h3>
        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'product_upload-form',
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            0
            ?>
            <div class="clearfix" style="padding: 0px 50px; text-align: center;">
                <div style="width: 48%; float: left;">
                    <?php
                    echo $form->labelEx($model, 'file');
                    echo $form->fileField($model, 'file');
                    echo $form->error($model, 'file');
                    ?>                    
                </div>
                <div>
                    <?php
                    echo CHtml::link(Yii::t('language', 'ดาวน์โหลดแบบฟอร์ม'), array('/eDirectory/default/readingFile', 'id' => null, 'type' => 'productXLS'));
                    ?>
                </div>                
            </div>
            <div class="textcenter">
                <hr>
                <?php
                echo CHtml::submitButton(Yii::t('language', 'อัพโหลด'));
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