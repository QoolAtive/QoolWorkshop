<?php
$this->renderPartial('_side_bar', array());
?>
<div class="content">
    <div class="tabcontents">
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่มข้อมูล'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
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