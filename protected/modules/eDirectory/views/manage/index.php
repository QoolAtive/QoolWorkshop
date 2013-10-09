<?php
$list = array(
    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '#', 'select' => 'selected'),
);

if ($model != null && Yii::app()->user->id == $model->user_id) {
    array_push($list, array('text' => Yii::t('language', 'แก้ไขข้อมูล'), 'link' => '/eDirectory/manage/regisEdirectory/id/' . $model->id, 'select' => ''));
    array_push($list, array('text' => Yii::t('language', 'จัดการสินค้าและบริการ'), 'link' => '/eDirectory/manage/product/id/' . $model->id, 'select' => ''));
}
$this->renderPartial('side_bar', array(
    'list' => $list,
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        if ($model == null) {
            ?>
            <div style='text-align: center;'>
                <ul>
                    <li>
                        <?php echo yii::t('language', 'ยังไม่มีการใช้งาน ระบบร้านค้า') ?>
                    </li>
                    <li>
                        <?php
                        echo CHtml::button(Yii::t('language', 'ใช้ระบบ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                                '/eDirectory/manage/regisEdirectory/'
                            )) . "'")
                        );
                        ?>
                    </li>
                </ul>
            </div>

            <?php
        } else {
            if ($model->status_appro == 0) {
                ?>
                <div class="clearfix _100" style="border: 1px solid red; padding: 10px 5px; color: red; font-weight: bold; background-color: pink; text-align: center;">
                    <?php echo Yii::t('language', '*ร้านค้าของคุณยังไม่ได้รับการยืนยันจากผู้ดูแลระบบ (waiting for approve)'); ?>
                </div> 
                <?php
            }
            ?>

            <?php
            $name = LanguageHelper::changeDB($model->name, $model->name_en);
            ?>
            <?php
            $model_them = CompanyThem::model()->find('main_id = :main_id', array(':main_id' => $model->id));
            if ($model_them->status_block == 1) {
                ?>
                <div class="clearfix _100" style="border: 1px solid red; padding: 10px 5px; color: red; font-weight: bold; background-color: pink; text-align: center;">
                    <?php echo Yii::t('language', 'ร้านค้าของคุณไม่ได้รับการอัพเดทข้อมูลเป็นระยะเวลานาน จำเป็นต้องทำการอัพเดทข้อมูล'); ?>
                </div>
                <?php
            }
            ?>
            <h3 class="barH3">
                <span>
                    <i class="icon-compass"></i> 
                    <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
                        <?php echo Yii::t('language', 'ข้อมูลส่วนตัว'); ?>
                    </a>
                    <i class="icon-chevron-right"></i>
                    <?php echo $name; ?>
                </span>
            </h3>

            <div class="clearfix servicebanner">
                <div class="shopbannerleft">
                    <div class="rslides_container">
                        <ul class="rslides" id="companyslider">
                            <?php
                            $link = str_replace('https://', '', $model->website);
                            $link = str_replace('http://', '', $link);
                            $link = str_replace(' ', '', $link);
                            if (!empty($link) && $link != '-')
                                $link = 'http://' . $link;
                            else
                                $link = '#';

                            $banner = CompanyBanner::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                            if ($banner == null) {
                                ?>
                                <li><a href="<?php echo $link; ?> " target="_bank"><img src="/file/banner/default.jpg" style="height: 220px; max-width: 525px;" /></a></li>
                                <li><a href="<?php echo $link; ?> " target="_bank"><img src="/file/banner/default.jpg" style="height: 220px; max-width: 525px;"/></a></li>
                                <li><a href="<?php echo $link; ?> " target="_bank"><img src="/file/banner/default.jpg" style="height: 220px; max-width: 525px;"/></a></li>
                                <?php
                            } else {
                                foreach ($banner as $data) {
                                    if (!strpos($data['path'], '.swf')) {
                                        ?>
                                        <li>
                                            <a href="<?php echo $link; ?> " target="_bank">
                                                <img src="/file/banner/<?php echo $data['path']; ?>" style="height: 220px;max-width: 525px;" />
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li>
                                            <a href="<?php echo $link; ?> " target="_bank">
                                                <object width="525" height="220"> 
                                                    <param name="flash" value="<?php echo $data['path']; ?>"> 
                                                    <embed src="/file/banner/<?php echo $data['path']; ?>" width="525" height="220"> 
                                                    </embed> 
                                                </object>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </ul>

                    </div>

                </div>

                <div class="Center-Container is-Inline-logo">
                    <div class="Center-Block">
                        <?php
                        if ($model->logo != null) {
                            ?>
                            <a href="<?php echo $link; ?> " target="_bank"><img src="/file/logo/<?php echo $model->logo; ?>" style="float: right;" width="220" class="Center-Block Absolute-Center is-Image" /></a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo $link; ?> " target="_bank"><img src="/file/logo/default.jpg" style="float: right;" width="220" class="Center-Block Absolute-Center is-Image"/></a>
                            <?php
                        }
                        ?>
                    </div>

                </div>

            </div>

            <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 5px 15px; margin: 5px 0;">
                <h2>
                    <img src="/img/icontopic.png" />
                    <?php
                    echo Yii::t('language', 'ข้อมูลของบริษัท');
                    if (Yii::app()->user->isAdmin()) {
                        echo CHtml::button(
                                Yii::t('language', 'แก้ไข'), array(
                            'class' => "grey", // btnedit grey
                            'style' => 'margin-left: 485px; margin-top: 0px; position:absolute;',
                            'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                                '/serviceProvider/manage/insertCompany/id/' . $model->id
                            )) . "'")
                        );
                    }
                    if ($model->verify == 1) {
                        ?>
                        <img alt="e-dirshoplogo"  src="/file/logo/dbd_verified.png"/>
                        <?php
                    }
                    ?>
                </h2>
                <table>
                    <tr>
                        <td><?php echo Yii::t('language', 'ชื่อบริษัท'); ?></td>
                        <td> : </td>
                        <td style="padding-left: 2px;">
                            <?php
                            //$name = LanguageHelper::changeDB($model->name, $model->name_en); //ย้ายไปอยู่ด้านบน เพื่อเรียกใช้ในหัวข้อด้วย
                            echo $name;
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo Yii::t('language', 'ประเภทร้านค้า'); ?></td>
                        <td class="colon"> : </td>
                        <td>
                            <?php
                            $type = CompanyType::model()->findAll('company_id=:company_id', array(':company_id' => $model->id));
                            $type_name_old = null;
                            foreach ($type as $data) {
                                $type_name = CompanyTypeBusiness::model()->find('id=:id', array(':id' => $data['company_type']));
                                $type_name = LanguageHelper::changeDB($type_name->name, $type_name->name_en);

                                if ($type_name_old != $type_name)
                                    $data_type .= $type_name . ', ';

                                $type_name_old = $type_name;
                            }
                            echo rtrim($data_type, ', ');
                            ?>
                        </td>
                    </tr>
                    <?php
                    $model_type_com_count = CompanyType::model()->count("company_id = {$model->id} and (company_sub_type_id is not null and company_sub_type_id != 0)");
                    if ($model_type_com_count > 0) {
                        ?>
                        <tr>
                            <td><?php echo Yii::t('language', 'ประเภทร้านค้าย่อย'); ?></td>
                            <td class="colon"> : </td>
                            <td>
                                <?php
                                $type_sub = CompanyType::model()->findAll('company_id=:company_id', array(':company_id' => $model->id));
                                $type_name_old_sub = null;
                                foreach ($type_sub as $data) {
                                    $type_name_sub = CompanySubTypeBusiness::model()->find('company_sub_type_business_id=:id', array(':id' => $data['company_sub_type_id']));
                                    $type_name_sub = LanguageHelper::changeDB($type_name_sub->name_th, $type_name_sub->name_en);

                                    if ($type_name_old_sub != $type_name_sub)
                                        $data_type_sub .= $type_name_sub . ', ';

                                    $type_name_old_sub = $type_name_sub;
                                }
                                echo rtrim($data_type_sub, ', ');
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td><?php echo Yii::t('language', 'ที่ตั้ง'); ?></td>
                        <td> : </td>
                        <td style="padding-left: 2px;">
                            <?php
                            $address = LanguageHelper::changeDB($model->address, $model->address_en);
                            echo $address;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('language', 'เว็บไซต์'); ?></td>
                        <td> : </td>
                        <td style="padding-left: 2px;">
                            <?php
                            $link = str_replace('https://', '', $model->website);
                            $link = str_replace('http://', '', $link);
                            $link = str_replace(' ', '', $link);
                            if (!empty($link) && $link != '-')
                                $link = 'http://' . $link;

                            echo CHtml::link($link, $link, array('target' => '_bank'));
                            ?>
                        </td>
                    </tr>
                    <?php
                    $brochure_count = CompanyBrochure::model()->count('com_id=:com_id', array(':com_id' => $model->id));
                    if ($brochure_count > 0) {
                        ?>
                        <tr>
                            <td><?php echo Yii::t('language', 'โบรชัวร์'); ?></td>
                            <td> : </td>
                            <td style="padding-left: 2px;">
                                <?php
                                $brochure = CompanyBrochure::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                                echo "<ul>";
                                foreach ($brochure as $data) {
                                    echo "<li>";
                                    echo CHtml::link($data['path'], array(
                                        '/eDirectory/default/readingFile/', 'id' => $data['company_brochure_id'], 'type' => 'brochure'), array(
//                                    'target' => '_bank'
                                    ));
                                    echo "</li>";
                                }
                                echo "</ul>";
                                ?>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
                <?php
                $infor = LanguageHelper::changeDB($model->infor, $model->infor_en);
                echo $infor;
                ?>
            </div>
            <?php
            $dp_product_best_sell = new CActiveDataProvider('CompanyProduct', array(
                'criteria' => array(
                    'condition' => 'guide = 1 and main_id = ' . $model->id,
                    'order' => 'id desc',
                ),
                'pagination' => array(
                    'pageSize' => 5,
                ),
            ));
            if ($dp_product_best_sell->itemCount > 0) {
                ?>
                <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 5px 15px; margin: 5px 0;">
                    <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'สินค้าขายดี'); ?></h2>
                    <div class="clearfix">
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider' => $dp_product_best_sell,
                            'itemView' => 'list_product',
                            'summaryText' => false,
                        ));
                        ?>
                    </div>
                </div>
                <?php
            }
            $dp_product_promo = new CActiveDataProvider('CompanyProduct', array(
                'criteria' => array(
                    'condition' => 'guide = 2 and main_id = ' . $model->id,
                    'order' => 'id desc',
                ),
                'pagination' => array(
                    'pageSize' => 5,
                ),
            ));
            if ($dp_product_promo->itemCount > 0) {
                ?>
                <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 5px 15px; margin: 5px 0;">
                    <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'โปรโมชั่น'); ?></h2>
                    <div class="clearfix">
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider' => $dp_product_promo,
                            'itemView' => 'list_product',
                            'summaryText' => false,
                        ));
                        ?>
                    </div>
                </div>
                <?php
            }
            $dp_product_new = new CActiveDataProvider('CompanyProduct', array(
                'criteria' => array(
                    'condition' => 'main_id = ' . $model->id,
                    'order' => 'id desc',
                ),
                'pagination' => array(
                    'pageSize' => 5,
                ),
            ));

            if ($dp_product_new->itemCount > 0) {
                ?>
                <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 5px 15px; margin: 5px 0;">
                    <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'สินค้าใหม่'); ?></h2>
                    <div class="clearfix">
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider' => $dp_product_new,
                            'itemView' => 'list_product',
                            'summaryText' => false,
                        ));
                        ?>
                    </div>   
                </div>
            <?php } ?>
            <div class="textcenter">
                <?php
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/serviceProvider/default/index/id/' . $type_business_back
                    )) . "'")
                );
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>
