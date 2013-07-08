<div style="padding: 0px 5px;">
    <h3>ประเภทธุรกิจ</h3>
    <hr>
    <div style="text-align: center;">
        <?php
        echo CHtml::button(Yii::t('language', 'เพิ่มประเภทธุรกิจ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/dataCenter/default/insertCompanyTypeBusiness'
            )) . "'")
        );
        ?>
    </div>
    <?php
    $this->renderPartial('_grid_company_type_business', array(
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