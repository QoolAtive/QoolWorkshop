<h3 class="barH3">
    <span><i class="icon-link"></i><?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กลุ่มลิงก์'); ?></span>
</h3>

<a class="linkgroupbtn fancybox.ajax btn" href="<?php echo CHtml::normalizeUrl(array("/link/default/groupform")); ?>">
    <?php
    echo Yii::t('language', 'เพิ่ม') . Yii::t('language', 'กลุ่มลิงก์');
    ?>
</a>
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
<div style="color: red; text-align: right;">    
    <?php
    echo '* ' . Yii::t('language', 'หมายเหตุ') . Yii::t('language', 'บางกลุ่มไม่สามารถลบได้ เพราะยังมีสมาชิกอยู่ภายในกลุ่มลิงก์');
    ?>
</div>