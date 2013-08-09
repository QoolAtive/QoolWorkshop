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
        $date = date('2013-01-01');
        $strtime = strtotime($date);
        $caltime = strtotime("+2 Month", $strtime);
        $update_at = date('Y-m-d', $caltime);
        if ($update_at < date('Y-m-d')) {
            echo "ข้อมูลไม่ได้อัพเดตมานานละนะ";
        }
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
                echo '<label style = "color: red;">' . Yii::t('language', '*ร้านค้าของคุณยังไม่ได้รับการยืนยันจากผู้ดูแลระบบ ร้านค้าของคุณจะยังไม่ได้รับการเพิ่มข้อมูลเข้าสู่ระบบร้านค้า') . '</label>';
            }
            ?>
            <?php
            $name = LanguageHelper::changeDB($model->name, $model->name_en);
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
            <div class="clearfix" style="border: 1px solid #e0e0e0; height: 220px; display: inline-block; width: 100%;">

                <div id="featured" > 
                    <?php
                    $banner = CompanyBanner::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                    if ($banner == null) {
                        ?>
                        <img src="/file/banner/default.jpg" style="height: 220px;" />
                        <img src="/file/banner/default.jpg" style="height: 220px;"/>
                        <img src="/file/banner/default.jpg" style="height: 220px;"/>
                        <?php
                    } else {
                        foreach ($banner as $data) {
                            ?>
                            <img src="/file/banner/<?php echo $data['path']; ?>" style="height: 220px;" />
                            <?php
                        }
                    }
                    ?>
                </div>
                <?php
                if ($model->logo != null) {
                    ?>
                    <img src="/file/logo/<?php echo $model->logo; ?>" style="float: right;" width="220" />
                    <?php
                } else {
                    ?>
                    <img src="/file/logo/default.jpg" style="float: right;" width="220" />
                    <?php
                }
                ?>
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
                        <td><?php echo Yii::t('language', 'ประเภทผู้ให้บริการ'); ?></td>
                        <td> : </td>
                        <td style="padding-left: 2px;">
                            <?php
                            $type = CompanyType::model()->findAll('company_id=:company_id', array(':company_id' => $model->id));
                            foreach ($type as $data) {
                                $type_name = SpTypeBusiness::model()->find('id=:id', array(':id' => $data['company_type']));
                                $type_name = LanguageHelper::changeDB($type_name->name, $type_name->name_en);
                                $data_type .= $type_name . ', ';
                            }
                            echo rtrim($data_type, ', ');
                            ?>
                        </td>
                    </tr>
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
                        <td style="padding-left: 2px;"><?php echo $model->website; ?></td>
                    </tr>
                    <?php
                    $brochure = CompanyBrochure::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                    if ($brochure > 0) {
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
