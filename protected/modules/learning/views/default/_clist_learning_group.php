<li>
    <?php
    $name = LanguageHelper::changeDB($data->name, $data->name_en);
    $pic = LanguageHelper::changeDB($data->pic, $data->pic_en);

    echo CHtml::link(
            CHtml::image('/file/learning/' . $pic, $name), Yii::app()->createUrl('/learning/default/index', array(
                'id' => $data->id,
                'title' => $name,
                    )
    ));
    ?>
</li>