<?php
$this->renderPartial('_side_menu', array('select' => 'main'));
//$main = FaqMain::model()->findByPk($main_id);
?>

<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <?php
        if ($model->faq_sub_id != NULL) {
            $word = 'แก้ไข';
        } else {
            $word = 'เพิ่ม';
        }
        ?>
        <h3 class="barH3">
            <span>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageCategory")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageCategory/#sub")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามย่อย'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . Yii::t('language', 'หมวดหมู่คำถามย่อย'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'update-form',
        ));
//        echo $form->errorSummary($model);
        ?>
        <div class="_100">
            <?php
            $field_name = LanguageHelper::changeDB('name_th', 'name_en');
            echo $form->labelEx($model, 'faq_main_id');
            echo $form->dropDownList($model, 'faq_main_id', CHtml::listData(FaqMain::model()->findAll(), 'id', $field_name), array(
                'class' => 'fieldrequire',
                'id' => 'faq_main'
            ));
            echo $form->error($model, 'faq_main_id');
            ?>
        </div>
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'name_th');
            echo $form->textField($model, 'name_th', array('class' => 'fieldrequire'));
            echo $form->error($model, 'name_th');
            ?>
        </div>
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en', array('class' => 'fieldrequire'));
            echo $form->error($model, 'name_en');
            ?>
        </div>

        <div class="_100 txt-cen">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/manageCategory/#sub")) . '"'
            ));
            ?>
            <hr>
        </div>
        <?php
        $this->endWidget();
        ?>
    </div>
</div>