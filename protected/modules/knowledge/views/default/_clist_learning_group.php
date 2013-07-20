<div style="width: 30%; display: inline-block;">
    <?php
    $pic = LanguageHelper::changeDB($data->pic, $data->pic_en);
    echo CHtml::link(
            CHtml::image('/file/learning/' . $pic, '', array(
                'height' => '135px',
                'width' => '225px'
            )), array(
        '/learning/default/index', 'id' => $data->id
            )
    );
    ?>
</div>