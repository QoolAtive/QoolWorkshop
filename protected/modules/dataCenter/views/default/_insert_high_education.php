<?php
$this->renderPartial('_sidebar', array(
    'selectEdu' => 'selected',
));
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
        <span>
            <i class="icon-cog"></i> <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">ตั้งค่าเว็บไซต์</a> 
            <i class="icon-chevron-right"></i><a href="<?php echo CHtml::normalizeUrl(array("/dataCenter/default/highEducation")); ?>">ระดับการศึกษา</a> 
            <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'เพิ่มระดับการศึกษา '); ?>
        </span>
        </h3>
    
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert_high_education-form',
        ));
        if ($model->id != NULL) {
            $btnText = 'แก้ไข';
        } else {
            $btnText = 'เพิ่ม';
        }
        ?>
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'name');
            echo $form->textField($model, 'name');
            echo $form->error($model, 'name')
            ?>
        </div>
      
       <div class="_50">
            <?php
            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en');
            echo $form->error($model, 'name_en')
            ?>
                   </div>


   <div class="_50">
            <?php
            echo $form->labelEx($model, 'abbreviation');
            echo $form->textField($model, 'abbreviation');
            echo $form->error($model, 'abbreviation')
            ?>
       </div>
    <div class="_50">
            <?php
            echo $form->labelEx($model, 'abbreviation_en');
            echo $form->textField($model, 'abbreviation_en');
            echo $form->error($model, 'abbreviation_en')
            ?>
                   </div>

       <div class="_100 textcenter">
            <?php
            echo CHtml::submitButton($btnText);
            echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/highEducation'
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
