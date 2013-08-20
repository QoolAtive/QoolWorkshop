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
        <h3>  <i class="icon-plus"></i> <?php echo Yii::t('language', 'ร้านค้า'); ?></h3>
        <hr>
        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'insert_company-form',
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