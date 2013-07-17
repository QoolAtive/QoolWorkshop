<!--<script>
    function hideDiv(data){
        $('#groupform').hide().html(data).fadeOut();
    }
    function showDiv(data){
        $('#groupform').hide().html(data).fadeIn();
    }
</script>-->

<h3 class="barH3">
    <span><?php echo Yii::t('language', 'จัดการกลุ่มลิ้งก์'); ?></span>
</h3>

<a class="linkgroupbtn fancybox.ajax btn" href="<?php echo CHtml::normalizeUrl(array("/link/default/groupform"));?>"><?php echo Yii::t('language', 'เพิ่มชื่อกลุ่มลิ้งค์'); ?></a>
<?php
//echo CHtml::link('เพิ่มชื่อกลุ่มลิ้งค์', '/link/default/groupform');
//echo CHtml::ajaxButton(
//        'เพิ่มชื่อกลุ่มลิ้งค์', CHtml::normalizeUrl(array('/link/default/groupform')), array('update' => '#groupform', 'success' => 'showDiv')
//);

?>


<div id="gridview_group">

    <?php
    echo $this->renderPartial('_gridview_grouplink', array(
        'model' => $model,
        'dataProvider' => $dataProvider,
    ));
    ?>
</div>
<?php
echo CHtml::button(Yii::t('language', 'กลับไปหน้าที่แล้ว'), array(
    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/manageLink")) . '"'));
?>
<div style="color: red; text-align: right;">*หมายเหตุ บางกลุ่มไม่สามารถลบได้ เพราะยังมีสมาชิกอยู่ภายในกลุ่มลิ้งก์</div>