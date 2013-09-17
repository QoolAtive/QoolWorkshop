<?php
$name = LanguageHelper::changeDB($data->name, $data->name_en);
$address = LanguageHelper::changeDB($data->address, $data->address_en);
$logo = $data->logo;
$model_type_com = SpTypeCom::model()->findAll("com_id ='" . $data->id . "'");
$model_type_com_sub_count = SpTypeCom::model()->count("com_id ='" . $data->id . "' and sp_type_business_sub_id is not null and sp_type_business_sub_id != 0");
$model_type_com_num = SpTypeCom::model()->findAll(array('condition' => "com_id ='" . $data->id . "'", 'group' => 'type_id'));
?>


<div class="servicelist">

    <h4>
        <?php
        echo CHtml::link($name, Yii::app()->createUrl('/serviceProvider/default/detail/', array(
                    'id' => $data->id,
                    'title' => $name,
                        )
        ));
        ?>
    </h4>
    <ul>
        <?php
        if (!empty($logo)) {
            ?>
            <li><img alt="service-logo"  src="/file/logo/<?php echo $data->logo; ?>"/></li>

            <?php
        } else {
            ?> <li><img alt="service-logo"  src="/file/logo/default.jpg"/></li> 
        <?php } ?>
        <li>
            <i class="icon-tags"></i> <label><?php echo Yii::t('language', 'ประเภทผู้ให้บริการ') . " : "; ?></label>
            <?php
            $size_type_com = sizeof($model_type_com_num);
            $i = 1;
            $name_old = null;
            foreach ($model_type_com as $m_tc) {
                $model_type = SpTypeBusiness::model()->findByPk($m_tc->type_id);
                $type_name = LanguageHelper::changeDB($model_type->name, $model_type->name_en);
                if ($name_old != $type_name) {
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
                $name_old = $type_name;
            }
            ?>
        </li>
        <?php
        if ($model_type_com_sub_count > 0) {
            ?>
            <li>
                <i class="icon-tags"></i> <label><?php echo Yii::t('language', 'ประเภทผู้ให้บริการย่อย') . " : "; ?></label>
                <?php
                $size_type_com = sizeof($model_type_com);
                $i = 1;
                $name_old = null;
                foreach ($model_type_com as $m_tc) {
                    $model_type = SpTypeBusinessSub::model()->findByPk($m_tc->sp_type_business_sub_id);
                    $type_name = LanguageHelper::changeDB($model_type->name_th, $model_type->name_en);
                    if ($name_old != $type_name) {
                        $type_name_link = CHtml::link($type_name, CHtml::normalizeUrl(
                                                array('/serviceProvider/default/partnerGroup/id/' . $m_tc->type_id . '/sp_type_business_sub_id/' . $m_tc->sp_type_business_sub_id)
                        ));
                        if ($size_type_com == $i) {
                            echo $type_name_link;
                        } else {
                            echo $type_name_link . ", ";
                            $i++;
                        }
                    }
                    $name_old = $type_name;
                }
                ?>
            </li>
            <?php
        }
        ?>
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
            <?php
            $link = str_replace('https://', '', $data->website);
            $link = str_replace('http://', '', $link);
            $link = str_replace(' ', '', $link);
            if (!empty($link) && $link != '-')
                $link = 'http://' . $link;

            echo CHtml::link($link, $link, array('target' => '_bank'));
            ?>
        </li>
        <li>
            <i class="icon-envelope"></i> <label><?php echo Yii::t('language', 'อีเมล์') . " : "; ?></label> 
            <?php echo $data->contact_email; ?>
        </li>
    </ul>
</div>
