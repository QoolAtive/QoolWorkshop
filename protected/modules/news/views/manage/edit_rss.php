<?php
$this->renderPartial('_sidemenu', array('mamane' => '3'));
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
                <i class="icon-rss"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/default/index/view/1")); ?>">
                    <?php echo Yii::t('language', 'RSS Feed'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'RSS Feed'); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'update-form',
        ));
        echo $form->errorSummary($model);
        ?>
        <div>
            <?php
            echo $form->labelEx($model, 'name_th');
            echo $form->textField($model, 'name_th', array('class' => 'fieldrequire'));
            ?>
        </div>
        <div>
            <?php
            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en', array('class' => 'fieldrequire'));
            ?>
        </div>
        <div>
            <?php
            echo $form->labelEx($model, 'link');
            echo $form->textField($model, 'link', array('class' => 'fieldrequire'));
            ?>
        </div>
        <div class="txt-cen">
            <hr>
            <?php
            echo CHtml::hiddenField('id', $model->id);
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/default/index")) . '"'));
            ?>
            <hr>
        </div>        
        <?php $this->endWidget(); ?>
    </div>
</div>