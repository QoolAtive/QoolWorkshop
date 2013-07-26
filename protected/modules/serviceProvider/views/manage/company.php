<?php
$this->renderPartial('_side_bar', array(
    'select1' => '',
    'select2' => 'selected',
));
?>
<div class="content">
    <div class="tabcontents">
        <h3><img src="/img/iconform.png"><?php echo Yii::t('language', 'จัดการ') . ' ' . Yii::t('language', 'พาร์ทเนอร์'); ?></h3>
        <hr>
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่มข้อมูล'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertCompany'
                )) . "'")
            );
            ?>
            <hr>
            <?php
            $this->renderPartial('_grid_company', array(
                'model' => $model,
            ));
            ?>
        </div>
    </div>
</div>