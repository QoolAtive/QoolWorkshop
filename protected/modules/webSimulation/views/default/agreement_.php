<style type="text/css">

    html, body{
        height: 100% !important;
    }
    #header{
        display: none !important;
    }
    #footer{
        display: none !important;
    }

    div.page{
        padding: 0px !important;
        margin: 0 !important;
        width: 800px;
        height: 200px !important;
        min-height: 200px !important;
        max-height: 200px !important;
        border: 0px !important;
        background-color: #f9f9f9;
    }

    #wrapper .bg{
        background: #f9f9f9 !important;
    }

</style>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'agree-form',
    'enableAjaxValidation' => false,
        ));
?>

<!--ข้อความ-->
<p style="text-align: center;"> ข้อตกลง </p>
<!--ข้อความ-->

<div style="text-align: center; padding:10px 0;">
    <?php echo CHtml::submitButton(Yii::t('language', 'ยอมรับ'), array(
        'class' => 'btn purple twhite',
        'name' => 'agree',
        'target' => '_parent'
        )); ?>
    <input type="button" value="ยกเลิก" class="grey" onClick="javascript:parent.jQuery.fancybox.close();"> 
<!--  -->
</div>


<?php
$this->endWidget();
?>