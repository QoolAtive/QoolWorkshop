<?php
$this->renderPartial('_sidebar', array());
?>

<div class="content">
    <div class="tabcontents">
   

            <h3 class="barH3">
        <span>
             <i class="icon-cog"></i> <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">ตั้งค่าเว็บไซต์</a> 
            <i class="icon-chevron-right"></i><a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/sex")); ?>">เพศ</a> 
            <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'เพิ่มเพศ '); ?>
        </span>
        </h3>

    <ul class="form _100">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert_sex-form',
            'focus' => array($model, 'name'),
        ));
        if ($model->id != NULL) {
            $btnText = 'แก้ไข';
        } else {
            $btnText = 'เพิ่ม';
        }
        ?>
        <li>
            <?php
            echo $form->labelEx($model, 'name');
            echo $form->textField($model, 'name');
            echo $form->error($model, 'name')
            ?>
        </li>
        <li>
            <?php
            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en');
            echo $form->error($model, 'name_en')
            ?>
        </li>
        <li class="textcenter">
            <?php
            echo CHtml::submitButton($btnText);
            echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/sex'
                )) . "'")
            );
            ?>
        </li>
    </ul>
    <?php
    $this->endWidget();
    ?>

</div>
</div>
