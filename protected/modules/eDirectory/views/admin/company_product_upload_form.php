<?php
$list = array(
    array('text' => Yii::t('language', 'ร้านค้าทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
    array('text' => Yii::t('language', 'จัดการสินค้าและบริการ'), 'link' => '/eDirectory/admin/product/id/' . $id, 'select' => ''),
    array('text' => Yii::t('language', 'อัพโหลดสินค้า'), 'link' => '#', 'select' => 'selected'),
);

$this->renderPartial('side_bar', array(
    'list' => $list,
))
?>
<div class="content">
    <div class="tabcontents">
        <h3>  <i class="icon-plus"></i> <?php echo Yii::t('language', 'สินค้า'); ?></h3>
        <hr>
        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'product_upload-form',
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>
            <div class="clearfix" style="padding: 0px 50px; text-align: center;">
                <div>
                    <?php
                    echo $form->labelEx($model, 'file');
                    echo $form->fileField($model, 'file');
                    echo $form->error($model, 'file');
                    ?>
                </div>
                <div>
                    <?php
                    echo CHtml::submitButton(Yii::t('language', 'อัพโหลด'));
                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php if ($errorTable != null) { ?>
                <div class='clearfix' style="border: 1px solid blueviolet; padding: 5px;">
                    <?php echo $errorTable; ?>
                </div>
            <?php } ?>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>