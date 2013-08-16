<?php
$this->renderPartial('_side_bar', array(
    'select1' => 'selected',
    'select2' => '',
));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-compass"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/default/index")); ?>">
                    <?php echo Yii::t('language', 'ผู้ให้บริการทั้งหมด'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/manage/typeBusiness")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'บริการ'); ?>
                </a> 
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'กลุ่มพาร์ทเนอร์'); ?> 
            </span>
        </h3>
        <hr>
        <div class="textcenter">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่มกลุ่มพาร์ทเนอร์'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertTypeBusiness'
                )) . "'")
            );
            ?>
            </div>
            <hr>
            <?php
            $this->renderPartial('_grid_type_business', array(
                'model' => $model,
            ));
            ?>
        
    </div>
</div>