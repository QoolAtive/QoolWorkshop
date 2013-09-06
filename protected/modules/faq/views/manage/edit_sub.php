<?php
$this->renderPartial('_side_menu', array('select' => 'main'));
$main = FaqMain::model()->findByPk($main_id);
?>

<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <?php
        if ($model->faq_sub_id != NULL) {
            $word = Yii::t('language', 'แก้ไข');
        } else {
            $word = Yii::t('language', 'เพิ่ม');
        }
        ?>
        <h3 class="barH3">
            <span>
                <i class="icon-question-sign"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageMain")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามหลัก'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageSub", 'main_id' => $main_id)); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่ย่อย') . ' ' . $main['name_th']; ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo $word . Yii::t('language', 'หมวดหมู่ย่อย'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'update-form',
        ));
        echo $form->errorSummary($model);
        ?>
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'name_th');
            echo $form->textField($model, 'name_th', array('class' => 'fieldrequire'));
            ?>
        </div>
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en', array('class' => 'fieldrequire'));
            ?>
        </div>

        <div class="_100 txt-cen">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/manageSub", 'main_id' => $main_id)) . '"'
            ));
            ?>
            <hr>
        </div>
        <?php
        $this->endWidget();
        ?>
    </div>
</div>