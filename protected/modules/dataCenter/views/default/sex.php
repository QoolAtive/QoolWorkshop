<div style="padding: 0px 5px;">
    <h3>เพศ</h3>
    <hr>
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
                '/dataCenter'
            )) . "'")
        );
        ?>
    </div>
</div>