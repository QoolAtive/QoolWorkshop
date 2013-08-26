<?php

$this->renderPartial('side_bar', array(
    'active' => 2,
))
?>
<div class="content">
    <div class="tabcontents"> 
        <h3 class="barH3">
            <span>
                <i class="icon-home"></i>
                <?php
                echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'), array('/eDirectory/admin/index'));
                ?>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'); ?>
            </span>
        </h3>
        <?php
        $this->renderPartial('company_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
            'visible' => false,
        ));
        ?>
    </div>
</div>