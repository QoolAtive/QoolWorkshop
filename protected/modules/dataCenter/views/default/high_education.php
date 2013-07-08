<div style="padding: 0px 5px;">
    <h3>ระดับการศึกษา</h3>
    <hr>
    <div style="text-align: center;">
        <?php
        echo CHtml::button('เพิ่มระดับการศึกษา', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/dataCenter/default/insertHighEducation'
            )) . "'")
        );
        ?>
    </div>
    <?php
    $this->renderPartial('_grid_high_education', array(
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