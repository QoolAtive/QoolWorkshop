<li>
    <?php
    $name = LanguageHelper::changeDB($data->name, $data->name_en);
    $pic = LanguageHelper::changeDB($data->pic, $data->pic_en);

    echo CHtml::link(
            CHtml::image('/file/learning/' . $pic, $name), array('/learning/default/index', 'id' => $data->id)
    );
    ?>
</li>