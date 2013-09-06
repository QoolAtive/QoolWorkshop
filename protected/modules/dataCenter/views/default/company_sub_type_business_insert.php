<?php
$this->renderPartial('_sidebar', array(
    'selectTBusiness' => 'selected',
));
if ($model->company_sub_type_business_id != NULL) {
    $btnText = 'แก้ไข';
} else {
    $btnText = 'เพิ่ม';
}
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-cog"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
                    <?php echo Yii::t('language', 'ตั้งค่าเว็บไซต์'); ?>
                </a> 
                <i class="icon-chevron-right"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/companyTypeBusiness")); ?>">
                    <?php echo Yii::t('language', 'ประเภทร้านค้า'); ?>
                </a> 
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', $btnText) . Yii::t('language', 'ประเภทร้านค้าย่อย'); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert_company_type_business_sub-form',
            'focus' => array($model, 'name'),
        ));
        ?>
        <h3><?php echo Yii::t('language', 'ประเภทร้านค้าย่อย'); ?></h3>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'company_type_business_id');
            echo $form->dropDownList($model, 'company_type_business_id', CHtml::listData(CompanyTypeBusiness::model()->findAll(), 'id', 'name'), array(
                'empty' => 'เลือก',
                'style' => 'width: 150px;',
            ));
            echo $form->error($model, 'company_type_business_id')
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'name_th');
            echo $form->textField($model, 'name_th');
            echo $form->error($model, 'name_th')
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en');
            echo $form->error($model, 'name_en')
            ?>
        </div>
        <div class="textcenter">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/companyTypeBusiness'
                )) . "'")
            );
            ?>
            <hr>
        </div>
        <?php
        $this->endWidget();
        ?>
    </div>
</div>