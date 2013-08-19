<?php
$this->renderPartial('_sidebar', array());
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
        <span>
             <i class="icon-cog"></i> 
            <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
             ตั้งค่าเว็บไซต์
            </a>
            <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'คำนำหน้าชื่อ'); ?>
        </span>
        </h3>
    <div style="text-align: center;">
        <?php
        echo CHtml::button('เพิ่มคำนำหน้า', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/dataCenter/default/insertTitleName'
            )) . "'")
        );
        ?>
    </div>
    <?php
    $this->renderPartial('_grid_title_name', array(
        'model' => $model,
    ));
    ?>
    <div style="text-align: center;">
        <?php
        echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/dataCenter'
            )) . "'")
        );
        ?>
    </div>
</div>
</div>