<?php
$this->renderPartial('_sidebar', array());
?>

<div class="content">
    <div class="tabcontents">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'change_password-form',
            'enableClientValidation' => false,
//    'clientOptions' => array(
//        'validateOnSubmit' => true,
//    ),
            'htmlOptions' => array(
                'autocomplete' => 'off',
            )
        ));
        ?>
        <div>


            <h3 class="barH3">
                <span>
                    <i class="icon-user"></i>

                    <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
                        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สมาชิก'); ?>
                    </a>
                    <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'เปลี่ยนรหัสผ่าน'); ?>
                </span>
            </h3>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'old_password');
                echo $form->passwordField($model, 'old_password');
                echo $form->error($model, 'old_password');
                ?>
            </div>
            <div class="_100"></div>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'password');
                echo $form->passwordField($model, 'password');
                echo $form->error($model, 'password');
                ?>
            </div>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 're_password');
                echo $form->passwordField($model, 're_password');
                echo $form->error($model, 're_password');
                ?>
            </div>
            <div class="btnForm _100 textcenter">
                <?php
                echo CHtml::submitButton(Yii::t('language', 'ยืนยัน'), array());
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/member/manage/profile'
                    )) . "'")
                );
                ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>

    </div>
</div>