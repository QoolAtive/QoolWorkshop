<h3 class="barH3">
    <span>
        <i class="icon-link"></i>
        <a href="<?php echo CHtml::normalizeUrl(array("/link/default/index")); ?>">
            <?php echo Yii::t('language', 'ลิงค์หน่วยงาน'); ?>
        </a>
        <i class="icon-chevron-right"></i>
        <a href="<?php echo CHtml::normalizeUrl(array("/link/default/managelink")); ?>">
            <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ลิงค์หน่วยงาน'); ?>
        </a>
        <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'กลุ่มลิงค์'); ?>
    </span>    
</h3>
<div class="txt-cen clearfix">
    <hr>
    <?php
    echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'กลุ่มลิงค์'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/groupform")) . '"'
    ));
    ?>
    <!--<a class="btn" href="#group-form" id="linkgroupbtn" >-->
    <!--<a class="btn fancybox.iframe" href="<?php echo CHtml::normalizeUrl(array("/link/default/groupform")); ?>" id="linkgroupbtn" >
    <?php
    echo Yii::t('language', 'เพิ่ม') . Yii::t('language', 'กลุ่มลิงค์');
    ?>
    </a>-->
    <hr>
</div>  
<div id="gridview_group">
    <?php
    echo $this->renderPartial('_gridview_grouplink', array(
        'model' => $model,
        'dataProvider' => $dataProvider,
    ));
    ?>
</div>
<div style="color: red; text-align: right;">
    <?php
    echo '*** ' . Yii::t('language', 'หมายเหตุ') . ' : ' . Yii::t('language', 'บางกลุ่มไม่สามารถลบได้ เพราะยังมีสมาชิกอยู่ภายในกลุ่มลิงค์');
    ?>
</div>
<div class="txt-cen">
    <hr>
    <?php
    echo CHtml::button(Yii::t('language', 'กลับไปหน้าที่แล้ว'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/manageLink")) . '"'));
    ?>
    <hr>
</div>

<!--fancybox เพิ่มกลุ่มลิ้งก์-->
<!--<div style="display:none">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'group-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'focus' => array($model, 'name_th')
        ));
//echo $form->errorSummary($model);
?>

    <div class="rowContact clearfix">
<?php
echo $form->labelEx($model, 'name_th');
echo $form->textField($model, 'name_th', array('class' => 'fieldrequire', 'size' => '30'));
echo $form->error($model, 'name_th');

echo $form->labelEx($model, 'name_en');
echo $form->textField($model, 'name_en', array('class' => 'fieldrequire', 'size' => '30'));
echo $form->error($model, 'name_en');
?>
    </div>

<?php
echo CHtml::hiddenField('id', $model->id);
echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array('id' => 'submit'));
echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => 'hideDiv();'));

//    echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => 'parent.$.fancybox.close();'));
$this->endWidget();
?>
</div>

<script>
    $(document).ready(function() {
        $('#linkgroupbtn').fancybox({
            width: '100%',
            closeBtn: 0,
            scrolling: 'no'
        });
        $("#group-form").bind("submit", function() {
            $.ajax({
                type: "POST",
                dataType: "json",
                cache: false,
                url: "<?php echo CHtml::normalizeUrl(array("/link/default/groupform")); ?>",
                data: $(this).serializeArray(),
                success: function(data) {
                    $.fancybox(data);
                },
            });

            return false;
        });
    });
</script>-->