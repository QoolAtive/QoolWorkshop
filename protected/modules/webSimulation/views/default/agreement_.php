<style type="text/css">

    html, body{
        height: 250px !important;
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
<h3 class="textcenter" style="padding-top: 20px;">Web Simulation</h3>
<p class="textcenter">ระบบแนะนำการทดลองการเปิดร้านค้าออนไลน์</p>

<div class="textcenter" style="  border: 1px solid;
     margin: 20px 40px;
     padding: 20px 0;">
    <p class="strong">คำแนะนำการใช้งานระบบ</p>
    <p style="text-indent: 20px;"> - ระบบนี้เป็นระบบจำลองเปิดร้านค้าออนไลน์ เพื่อให้ผู้สนใจ มีความรู้ความเข้าใจในการเปิดร้านค้าออนไลน์</p>
    <!-- <p style="text-indent: 20px;"> - </p> -->


</div>
<!--ข้อความ-->

<div style="text-align: center; padding:10px 0;">
    <?php
    echo CHtml::submitButton(Yii::t('language', 'ตกลง'), array(
        'class' => 'btn purple twhite',
        'name' => 'agree',
        'target' => '_parent'
    ));
    ?>
    <input type="button" value="ยกเลิก" class="grey" onClick="javascript:parent.jQuery.fancybox.close();"> 
    <!--  -->
</div>


<?php
$this->endWidget();
?>