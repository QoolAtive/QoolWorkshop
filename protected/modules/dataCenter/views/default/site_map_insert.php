<?php
$this->renderPartial('_sidebar', array(
    'selectSiteMap' => 'selected',
));

if ($model->site_map_id != NULL) {
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
                <a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/siteMap")); ?>">
                    <?php echo Yii::t('language', 'แผนผังเว็บไซต์'); ?>
                </a> 
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', $btnText) . Yii::t('language', 'หมวดหมู่หลัก'); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'site_map_insert-form',
            'focus' => array($model, 'detail'),
        ));
        ?>
        <div class="_100">
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'name');
                echo $form->textField($model, 'name');
                echo $form->error($model, 'name')
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'name_en');
                echo $form->textField($model, 'name_en');
                echo $form->error($model, 'name_en')
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'link');
                echo $form->textField($model, 'link');
                echo $form->error($model, 'link')
                ?>
            </div>
            <div class="_100" style="text-align: center;">
                <hr>
                <?php
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/dataCenter/default/siteMap'
                    )) . "'")
                );
                ?>
                <hr>
            </div>
        </div>
        <?php
        $this->endWidget();
        ?>

    </div>
</div>
