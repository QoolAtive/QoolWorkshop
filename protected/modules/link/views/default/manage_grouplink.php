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
    <a class="linkgroupbtn fancybox.ajax btn" href="<?php echo CHtml::normalizeUrl(array("/link/default/groupform")); ?>">
        <?php
        echo Yii::t('language', 'เพิ่ม') . Yii::t('language', 'กลุ่มลิงค์');
        ?>
    </a>
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
