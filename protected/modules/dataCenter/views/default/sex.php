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
            <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'เพศ'); ?>
        </span>
        </h3>
    
    <div style="text-align: center;">
        <?php
        echo CHtml::button(Yii::t('language', 'เพิ่มเพศ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/dataCenter/default/insertSex'
            )) . "'")
        );
        ?>
    </div>
    <?php
    $this->renderPartial('_grid_sex', array(
        'model' => $model,
    ));
    ?>
    <div style="text-align: center;">
        <?php
        echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/member/manage/profile'
            )) . "'")
        );
        ?>
    </div>
</div>
</div>