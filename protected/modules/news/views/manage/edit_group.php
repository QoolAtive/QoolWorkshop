<?php
$this->renderPartial('_side_menu', array('manage' => '1'));
?>

<div class="content">
    <div class="tabcontents">
        <?php
        if ($model->id == NULL) {
            $word = 'เพิ่ม';
        } else {
            $word = 'แก้ไข';
        }
        ?>
        <h3 class="barH3">
            <span>
                <i class="icon-bell-alt"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/default/index/view/1")); ?>">
                    <?php echo Yii::t('language', 'ข่าว'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/manage/index")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ข่าว'); ?>
                </a>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/manage/manageGroup")); ?>">
                    <i class="icon-chevron-right"></i>
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กลุ่มข่าว'); ?>
                </a>                
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . trim(Yii::t('language', 'กลุ่มข่าว')); ?>
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
//    ภาษาไทย
//        echo "<h4>" . Yii::t('language', 'ภาษาไทย') . "</h4>";
        echo $form->labelEx($model, 'name_th');
        echo $form->textField($model, 'name_th', array('class' => 'fieldrequire'));
?>
</div>

<div class="_50">
<?php
//    ภาษาอังกฤษ
//        echo "<h4>" . Yii::t('language', 'ภาษาอังกฤษ') . "</h4>";
        echo $form->labelEx($model, 'name_en');
        echo $form->textField($model, 'name_en', array('class' => 'fieldrequire'));
        ?>
</div>
        <div class="txt-cen _100">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/manageGroup")) . '"'));
            ?>
            <hr>                
        </div>        
        <?php $this->endWidget(); ?>
    </div>
</div>