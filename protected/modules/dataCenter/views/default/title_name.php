<div style="padding: 0px 5px;">
    <h3>คำนำหน้า</h3>
    <hr>
    <div style="text-align: center;">
        <?php
        echo CHtml::button('เพิ่มคำนำหน้า', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/dataCenter/default/insertTitleName'
            )) . "'")
        );
        ?>
    </div>
    <?php
    $this->renderPartial('_grid_title_name', array(
        'model' => $model,
    ));
    ?>
    <div style="text-align: center;">
        <?php
        echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/dataCenter'
            )) . "'")
        );
        ?>
    </div>
</div>