<?php
$this->renderPartial('_side_bar', array());
?>
<div class="content">
    <div class="tabcontents">
        <div id="view7" class="tabcontent">
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
        <div id="view8" class="tabcontent">
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
                    'model' => $model_com,
                ));
                ?>
            </div>
        </div>

    </div>
</div>
