<?php
$this->renderPartial('_sidebar', array());
?>



<div class="content">
    <div class="tabcontents">


        <h3 class="barH3">
            <span>
                <i class="icon-cog"></i> <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">ตั้งค่าเว็บไซต์</a> 
                <i class="icon-chevron-right"></i><a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/titleWeb")); ?>"><?php echo Yii::t('language', 'Description'); ?></a> 
                <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'เพิ่ม') . ' ' . Yii::t('language', 'Description'); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'description_insert-form',
            'focus' => array($model, 'detail'),
        ));
        if ($model->description_id != NULL) {
            $btnText = 'แก้ไข';
        } else {
            $btnText = 'เพิ่ม';
        }
        ?>
        <div class="_100">
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'detail');
                echo $form->textArea($model, 'detail');
                echo $form->error($model, 'detail')
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'detail_en');
                echo $form->textField($model, 'detail_en');
                echo $form->error($model, 'detail_en')
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'status') . "<br />";
                echo $form->dropDownList($model, 'status', TitleWeb::model()->getStatus(), array('style' => 'width: 150px;'));
                echo $form->error($model, 'status')
                ?>
            </div>
            <div class="_100" style="text-align: center;">
                <?php
                echo CHtml::submitButton($btnText);
                echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/dataCenter/default/description'
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
