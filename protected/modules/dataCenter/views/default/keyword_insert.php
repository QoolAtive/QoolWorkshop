<?php
$this->renderPartial('_sidebar', array());
?>



<div class="content">
    <div class="tabcontents">


        <h3 class="barH3">
            <span>
                <i class="icon-cog"></i> <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>"><?php echo Yii::t('language', 'ตั้งค่าเว็บไซต์'); ?></a> 
                <i class="icon-chevron-right"></i><a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/keyword")); ?>"><?php echo Yii::t('language', 'Keyword'); ?></a> 
                <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'เพิ่ม') . ' ' . Yii::t('language', 'Keyword'); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'keyword_insert-form',
            'focus' => array($model, 'name'),
        ));
        if ($model->keyword_id != NULL) {
            $btnText = 'แก้ไข';
        } else {
            $btnText = 'เพิ่ม';
        }
        ?>
        <div class="_100">
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'name');
                echo $form->textField($model, 'name');
                echo $form->error($model, 'name')
                ?>
            </div>
            <div class="_100" style="text-align: center;">
                <?php
                echo CHtml::submitButton($btnText);
                echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/dataCenter/default/keyword'
                    )) . "'")
                );
                ?>
            </div>
        </div>
        <?php
        $this->endWidget();
        ?>

    </div>
</div>
