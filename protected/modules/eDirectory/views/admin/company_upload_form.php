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
            $model_type->company_type = $type_list_data;
            ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>