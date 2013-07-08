<div style="padding: 5px 30px;">
    <h3>เพิ่มบทความ</h3>
    <hr>
    <ul class="form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert_high_education-form',
        ));
        if ($model->id != NULL) {
            $btnText = 'แก้ไข';
        } else {
            $btnText = 'เพิ่ม';
        }
        ?>
        <li>
            <?php
            echo $form->label($model, 'name');
            echo $form->textField($model, 'name');
            echo $form->error($model, 'name')
            ?>
        </li>
        <li>
            <?php
            echo $form->label($model, 'abbreviation');
            echo $form->textField($model, 'abbreviation');
            echo $form->error($model, 'abbreviation')
            ?>
        </li>
        <li>
            <?php
            echo CHtml::submitButton($btnText);
            echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/highEducation'
                )) . "'")
            );
            ?>
        </li>
    </ul>
    <?php
    $this->endWidget();
    ?>
</div>
