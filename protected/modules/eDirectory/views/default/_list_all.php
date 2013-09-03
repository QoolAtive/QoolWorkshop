<?php
$name = LanguageHelper::changeDB($data->name, $data->name_en);
$address = LanguageHelper::changeDB($data->address, $data->address_en);
$logo = $data->logo;
$model_type_com = CompanyType::model()->findAll("company_id ='" . $data->id . "'");
?>

<div class="servicelist clearfix">

    <h4>
        <?php
        echo CHtml::link($name, CHtml::normalizeUrl(
                        array('/eDirectory/default/companyDetail/id/' . $data->id)
        ));
        ?>
    </h4>
    <ul>

       
        <li>
            <i class="icon-tags"></i> <label><?php echo Yii::t('language', 'ประเภทร้านค้า') . " : "; ?></label>
            <?php
            $size_type_com = sizeof($model_type_com);
            $i = 1;
            foreach ($model_type_com as $m_tc) {
                $model_type = CompanyTypeBusiness::model()->findByPk($m_tc->company_type);
                $type_name = LanguageHelper::changeDB($model_type->name, $model_type->name_en);
//                    $type_name_link = CHtml::link($type_name, CHtml::normalizeUrl(
//                                            array('/serviceProvider/default/partnerGroup/id/' . $m_tc->company_type)
//                    ));
                $type = $type_name;
                if ($size_type_com == $i) {
                    echo $type;
                } else {
                    echo $type . ", ";
                    $i++;
                }
            }
            ?>
        </li>
        <li>
            <i class="icon-map-marker"></i> <label><?php echo Yii::t('language', 'ที่ตั้ง') . " : "; ?></label>
            <?php echo $address; ?>
        </li>
        <li>
            <i class="icon-phone"></i> <label><?php echo Yii::t('language', 'โทร.') . " : "; ?></label>
            <?php echo $data->contact_tel; ?>
        </li>
        <li>
            <i class="icon-globe"></i> <label><?php echo Yii::t('language', 'เว็บไซต์') . " : "; ?></label>
            <?php echo $data->website; ?>
        </li>

    </ul>
</div>
