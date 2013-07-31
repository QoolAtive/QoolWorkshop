<ul style="display: inline-block;">
    <li>
        <img src="/file/product/<?php echo $data->image; ?>" height="100">
    </li>
    <li>
        <label><?php echo $data->name; ?></label>
    </li>
    <li>
        <label><?php echo $data->detail; ?></label>
    </li>
    <li>
        <?php
        if (Yii::app()->user->isAdmin()) {
            echo CHtml::button(Yii::t('language', 'แก้ไข'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertProduct/id/' . $_GET['id'] . '/pro_id/' . $data->id
                )) . "'")
            );
        }
        ?>
    </li>
</ul>
 