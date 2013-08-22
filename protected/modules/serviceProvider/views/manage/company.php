<?php
$this->renderPartial('_side_bar', array(
    'select1' => '',
    'select2' => 'selected',
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
                <?php echo Yii::t('language', 'พาร์ทเนอร์'); ?>    
            </span>
        </h3>

        <div style="text-align: center;">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'พาร์ทเนอร์'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertCompany'
                )) . "'")
            );
            ?>
            <hr>
            </div>
        <div>
            <?php
            $this->renderPartial('_grid_company', array(
                'model' => $model,
            ));
            ?>
        </div>
    </div>
</div>