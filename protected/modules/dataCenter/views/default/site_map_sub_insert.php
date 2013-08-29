<?php
$this->renderPartial('_sidebar', array(
    'selectTWeb' => 'selected',
));
?>

<div class="content">
    <div class="tabcontents">


        <h3 class="barH3">
            <span>
                <i class="icon-cog"></i> <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>"><?php echo Yii::t('language', 'ตั้งค่าเว็บไซต์'); ?></a> 
                <i class="icon-chevron-right"></i><a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/siteMap")); ?>"><?php echo Yii::t('language', 'แผนผังเว็บไซต์'); ?></a> 
                <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'เพิ่ม') . Yii::t('language', 'แผนผังเว็บไซต์'); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'site_map_sub_insert-form',
            'focus' => array($model, 'detail'),
        ));
        if ($model->site_map_sub_id != NULL) {
            $btnText = 'แก้ไข';
        } else {
            $btnText = 'เพิ่ม';
        }
        ?>
        <div class="_100">
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'main_id');
                echo $form->dropDownList($model, 'main_id', SiteMap::model()->getDataArray());
                echo $form->error($model, 'main_id')
                ?>
            </div>
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
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'sort');
                echo $form->textField($model, 'sort');
                echo $form->error($model, 'sort')
                ?>
            </div>
            <div class="_100" style="text-align: center;">
                <?php
                echo CHtml::submitButton($btnText);
                echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/dataCenter/default/siteMap'
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
