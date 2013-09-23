<?php
$this->renderPartial('_side_menu', array('manage' => '4'));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-bell-alt"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/default/index/view/1")); ?>">
                    <?php echo Yii::t('language', 'ข่าว'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/default/index/view/1")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'อีเมล์') . ' ' . Yii::t('language', 'สมัครรับข้อมูลข่าวสาร'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php
                if ($model->news_mail_id == NULL) {
                    echo Yii::t('language', 'เพิ่ม');
                } else {
                    echo Yii::t('language', 'แก้ไข');
                }
                echo Yii::t('language', 'อีเมล์') . ' ' . Yii::t('language', 'สมัครรับข้อมูลข่าวสาร');
                ?>
            </span>
        </h3>

        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'edit_news_mail-form',
            ));
//        echo $form->errorSummary($model);
            ?>
            <?php
            echo $form->labelEx($model, 'email') . ' : ' . $form->textField($model, 'email', array('class' => 'fieldrequire'));
            echo $form->error($model, 'email');
            ?>
        </div>

        <div class="txt-cen _100">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/manageEmail")) . '"'));
            ?>
            <hr>                
        </div>   
        <?php $this->endWidget(); ?>
    </div>
</div>