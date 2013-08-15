<?php
$name = LanguageHelper::changeDB($data->name, $data->name_en);
$address = LanguageHelper::changeDB($data->address, $data->address_en);
$model_type_com = SpTypeCom::model()->findAll("com_id ='" . $data->id . "'");
?>


<div class="servicelist clearfix Center-Container is-Inline">
    <div class="Center-Block">
    <h4>
        <?php
        echo CHtml::link($name, CHtml::normalizeUrl(
                        array('/serviceProvider/default/detail/id/' . $data->id)
        ));
        ?>
    </h4>
    <ul>
        <li>
            <label><?php echo Yii::t('language', 'ประเภทผู้ให้บริการ') . ":"; ?></label>
            <?php
            $size_type_com = sizeof($model_type_com);
            $i = 1;
            foreach ($model_type_com as $m_tc) {
                $model_type = SpTypeBusiness::model()->findByPk($m_tc->type_id);
                $type_name = LanguageHelper::changeDB($model_type->name, $model_type->name_en);
                $type_name_link = CHtml::link($type_name, CHtml::normalizeUrl(
                                        array('/serviceProvider/default/partnerGroup/id/' . $m_tc->type_id)
                ));
                if ($size_type_com == $i) {
                    echo $type_name_link;
                } else {
                    echo $type_name_link . ", ";
                    $i++;
                }
            }
            ?>
        </li>
        <li>
            <label><?php echo Yii::t('language', 'ที่ตั้ง') . ":"; ?></label>
            <?php echo $address; ?>
        </li>
        <li>
            <label><?php echo Yii::t('language', 'โทร.') . ":"; ?></label>
            <?php echo $data->contact_tel; ?>
        </li>
        <li>
            <label><?php echo Yii::t('language', 'เว็บไซต์') . ":"; ?></label>
            <?php echo $data->website; ?>
        </li>
    </ul></div>
</div>
