<?php
$name = LanguageHelper::changeDB($data->name, $data->name_en);
$address = LanguageHelper::changeDB($data->address, $data->address_en);
$logo = $data->logo;
$model_type_com_count = CompanyType::model()->count("company_id = {$data->id} and (company_sub_type_id is not null and company_sub_type_id != 0)");
?>

<div class="servicelist clearfix">

    <h4>
        <?php
        echo CHtml::link($name, Yii::app()->createUrl('/eDirectory/default/companyDetail', array(
                    'id' => $data->id,
                    'title'=>$name
                        )
        ));
        ?>
    </h4>
    <ul>

        <?php
        if (!empty($logo)) {
            ?>
            <li><img alt="e-dirshoplogo"  src="/file/logo/<?php echo $data->logo; ?>"/></li>

            <?php
        } else {
            ?> <li><img alt="e-dirshoplogo"  src="/file/logo/default.jpg"/></li> 
        <?php } ?>

        <li>
            <i class="icon-tags"></i> <label><?php echo Yii::t('language', 'ประเภทร้านค้า') . " : "; ?></label>
            <?php
//            $size_type_com = sizeof($model_type_com);
//            $i = 1;
//            foreach ($model_type_com as $m_tc) {
//                $model_type = CompanyTypeBusiness::model()->findByPk($m_tc->company_type);
//                $type_name = LanguageHelper::changeDB($model_type->name, $model_type->name_en);
////                    $type_name_link = CHtml::link($type_name, CHtml::normalizeUrl(
////                                            array('/serviceProvider/default/partnerGroup/id/' . $m_tc->company_type)
////                    ));
//                $type = $type_name;
//                if ($size_type_com == $i) {
//                    echo $type;
//                } else {
//                    echo $type . ", ";
//                    $i++;
//                }
//            }
            ?>
            <?php
            $type = CompanyType::model()->findAll('company_id=:company_id', array(':company_id' => $data->id));
            $type_name_old = null;
            foreach ($type as $d) {
                $type_name = CompanyTypeBusiness::model()->find('id=:id', array(':id' => $d['company_type']));
                $type_name = LanguageHelper::changeDB($type_name->name, $type_name->name_en);

                if ($type_name_old != $type_name)
                    $data_type .= $type_name . ', ';

                $type_name_old = $type_name;
            }
            echo rtrim($data_type, ', ');
            ?>
        </li>
        <?php
        if ($model_type_com_count > 0) {
            ?>
            <li>
                <i class="icon-tags"></i> <label><?php echo Yii::t('language', 'ประเภทร้านค้าย่อย') . " : "; ?></label>
                <?php
                $type_sub = CompanyType::model()->findAll('company_id=:company_id', array(':company_id' => $data->id));
//            echo "<pre>";
//            print_r($type_sub->attributes);
                $type_name_old_sub = null;
                foreach ($type_sub as $d2) {
                    $type_name_sub = CompanySubTypeBusiness::model()->find('company_sub_type_business_id=:id', array(':id' => $d2['company_sub_type_id']));
                    $type_name_sub = LanguageHelper::changeDB($type_name_sub->name_th, $type_name_sub->name_en);

                    if ($type_name_old_sub != $type_name_sub)
                        $data_type_sub .= $type_name_sub . ', ';

                    $type_name_old_sub = $type_name_sub;
                }
                echo rtrim($data_type_sub, ', ');
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
