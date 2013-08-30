<div style='min-height: 35px;'>
    <?php
    echo CHtml::beginForm($url, 'get', $htmlOptions);
//if($label) echo CHtml::label($label, 'q');
    ?>
    <div style='float: left;'>
        <?php
        echo CHtml::textField('q', Yii::app()->request->getQuery('q'), array(
            'class' => $htmlOptions['class'] . '-input',
            'placeholder' => Yii::t('language', 'ค้นหา') . '...',
//            'style' => 'width:160px;',
        ));
        ?>

    </div>
    <div style='float: left; padding-left: 5px;'>
        <?php
        if ($htmlOptions['label']) {
            echo CHtml::submitButton($htmlOptions['label'], array(
                'class' => $htmlOptions['class'] . '-button',
                'name' => null,
            ));
        }
        ?>
    </div>
    <?php
    echo CHtml::endForm();
    ?>
</div>

