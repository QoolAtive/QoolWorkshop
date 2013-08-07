<?php
$this->renderPartial('_side_bar', array(
    'select1' => '',
    'select2' => 'selected',
));

$title = SpCompany::model()->find('id=:id', array(':id' => $id));
$company_name = LanguageHelper::changeDB($title->name, $title->name_en);
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
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/manage/company")); ?>">
                    <?php echo Yii::t('language', 'พาร์ทเนอร์'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าและบริการ') . ' (' . $company_name . ') '; ?>
            </span>
        </h3>

        <div style="text-align: center;">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'สินค้าและบริการ'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertProduct/id/' . $id
                )) . "'")
            );
            ?>
            <hr>
            <div>
                <?php
                $this->renderPartial('_grid_product', array(
                    'model' => $model,
                    'id' => $id,
                ));
                ?>
            </div>
        </div>
        <div class="_100 textcenter">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/company'
                )) . "'")
            );
            ?>
            <hr>
        </div>
    </div>
</div>