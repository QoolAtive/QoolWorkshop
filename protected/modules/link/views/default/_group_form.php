<div class="content_front" class="clearfix">
    <?php
    $name_btn = Yii::t('language', 'เพิ่ม');
    if ($model->id != '') {
        $name_btn = Yii::t('language', 'แก้ไข');
    }
    ?>
    <h3 class="barH3">
        <span>
            <i class="icon-link"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/link/default/index")); ?>">
                <?php echo Yii::t('language', 'ลิงก์หน่วยงาน'); ?>
            </a>
            <i class="icon-chevron-right"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/link/default/manageGroupLink")); ?>">
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กลุ่มลิงก์'); ?>
            </a>
            <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'กลุ่มลิงก์'); ?>
        </span>
    </h3>
    <div class="bucketLeft clearfix">
        <div class="areaWhite clearfix">
            <div class="group">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'group-form',
                    'focus' => array($model, 'name_th')
                ));
//echo $form->errorSummary($model);
                ?>

                <div class="rowContact clearfix">
                    <?php
                    echo $form->labelEx($model, 'name_th');
                    echo $form->textField($model, 'name_th', array('class' => 'fieldrequire', 'size' => '30'));
                    echo $form->error($model, 'name_th');
                    ?>
                </div>
                <div class="rowContact clearfix">
                    <?php
                    echo $form->labelEx($model, 'name_en');
                    echo $form->textField($model, 'name_en', array('class' => 'fieldrequire', 'size' => '30'));
                    echo $form->error($model, 'name_en');
                    ?>
                </div>

                <?php
                echo CHtml::hiddenField('id', $model->id);
                ?>
                <div class="btnForm">
                    <div class="txt-cen">
                        <hr/>
                        <?php
                        echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array('id' => 'submit'));
                        echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                            'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/managegrouplink")) . '"'));

//                        echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => '$.fancybox.close();'));
                        ?>
                        <hr/>
                    </div>
                    <?php
                    $this->endWidget();
                    ?>
                </div> <!--<div class="group">-->
            </div>
        </div>
    </div>
