<?php
$name = LanguageHelper::changeDB($data->name, $data->name_en);
$detail = LanguageHelper::changeDB($data->detail, $data->detail_en);
?>
<ul style="display: inline-block;">
    <li>
        <img src="/file/product/<?php echo $data->image; ?>" height="100">
    </li>
    <?php
    if (Yii::app()->user->isAdmin()) {
        ?>
        <li style="padding: 0 25%;">
            <?php
            echo CHtml::button(Yii::t('language', 'แก้ไข'), array(
                'class' => "grey", // btnedit grey
//                'style' => 'margin-left: 669px; margin-top: 0px; position:absolute;',
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertProduct/id/' . $_GET['id'] . '/pro_id/' . $data->id
                )) . "'")
            );
            ?>
        </li>
        <?php
    }//end if (Yii::app()->user->isAdmin()) {
    ?>
    <li>
        <label><?php echo $name; ?></label>
    </li>
    <li>
        <label><?php echo $detail; ?></label>
    </li>

</ul>
