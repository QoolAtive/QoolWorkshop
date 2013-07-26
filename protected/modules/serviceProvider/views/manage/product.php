<?php
$this->renderPartial('_side_bar', array(
    'select1' => '',
    'select2' => 'selected',
));

$title = SpCompany::model()->find('id=:id', array(':id' => $id));
?>
<div class="content">
    <div class="tabcontents">
        <h3><img src="/img/iconform.png"><?php echo Yii::t('language', 'จัดการสินค้า') . ' ' . Yii::t('language', 'บริษัท') . ' ' . $title->name; ?></h3>
        <hr>
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'บันทึก'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertProduct/id/' . $id
                )) . "'")
            );
            ?>
            <hr>
            <?php
            $this->renderPartial('_grid_product', array(
                'model' => $model,
                'id' => $id,
            ));
            ?>
        </div>
        <div class="_100 textcenter">
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/company'
                )) . "'")
            );
            ?>
        </div>
    </div>
</div>