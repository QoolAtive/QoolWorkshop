<?php
$this->renderPartial('_side_bar', array(
    'select1' => 'selected',
    'select2' => '',
));
?>
<div class="content">
    <div class="tabcontents">
        <h3><img src="/img/iconform.png"><?php echo Yii::t('language', 'กลุ่มพาร์ทเนอร์'); ?></h3>
        <hr>
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่มกลุ่มพาร์ทเนอร์'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertTypeBusiness'
                )) . "'")
            );
            ?>
            <hr>
            <?php
            $this->renderPartial('_grid_type_business', array(
                'model' => $model,
            ));
            ?>
        </div>
    </div>
</div>