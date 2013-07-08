<div style="padding: 5px 30px;">
    <h3>เพิ่มบทความ</h3>
    <hr>
    <ul class="form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert_title_name-form',
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
            echo $form->label($model, 'language');
            echo $form->dropDownList($model, 'language', array('th' => 'th', 'en' => 'en'), array('empty' => 'เลือก'));
            echo $form->error($model, 'language')
            ?>
        </li>
        <li>
            <?php
            echo CHtml::submitButton($btnText);
            echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/titleName'
                )) . "'")
            );
            ?>
        </li>
    </ul>
    <?php
    $this->endWidget();
    ?>
</div>
