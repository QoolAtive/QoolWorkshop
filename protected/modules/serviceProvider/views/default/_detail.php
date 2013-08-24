<style type="text/css">
#replyuser{display:none;}
</style>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead">
                <img src="<?php echo Yii::t('language', '/img/iconpage/serviceprovider.png'); ?>"/>
            </li>
            <li class="servicedata">
                
                <span class="left" style="padding:10px 10px; ">

                    <i class="icon-eye-open"></i>
                    <?php
//                  echo Yii::t('language', 'Memeber Since') . ' ' ;
//                  echo Tool::ChangeDateTimeToShow($model_count->update_at) . ' ' ;
                    // echo Yii::t('language', 'จำนวนการเข้าชม') . ' : ' . $model_count->count_company_view;
echo ' : ' . $model_count->count_company_view;
                    ?>
                </span>
                <div style="padding: 2px 10px;">
                <table>
                    <tr>
                        <td><?php echo Yii::t('language', 'ชื่อ'); ?></td>
                        <td> : </td>
                        <td>
                            <?php
                            $contact_name = LanguageHelper::changeDB($model->contact_name, $model->contact_name_en);
                            echo $contact_name;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('language', 'อีเมล์'); ?></td>
                        <td> : </td>
                        <td><?php echo $model->contact_email; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('language', 'โทรสาร.'); ?></td>
                        <td> : </td>
                        <td><?php echo $model->contact_fax; ?></td>
                    </tr>
                    <tr> <td><?php echo Yii::t('language', 'โทร.'); ?></td>
                        <td> : </td>
                        <td><?php echo $model->contact_tel; ?></td>
                    </tr>
                </table>
            </div>
            </li>
        </ul>

    </div>
</div>
<div class="content">
    <div class="tabcontents" >
        <?php
        $name = LanguageHelper::changeDB($model->name, $model->name_en);
        ?>
        <h3 class="barH3">
            <span>
                <i class="icon-compass"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/default/index")); ?>">
                    <?php echo Yii::t('language', 'ผู้ให้บริการทั้งหมด'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo $name; ?>
            </span>
        </h3>
        <div class="clearfix servicebanner">
            <div style="float: left; width: 525px; height: 220px; ">
                <div id="featured"> 
                    <?php
                    $banner = SpBanner::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                    if ($banner == null) {
                        ?>
                        <img src="/file/banner/default.jpg" style="height: 220px; max-width: 525px;" />
                        <img src="/file/banner/default.jpg" style="height: 220px; max-width: 525px;"/>
                        <img src="/file/banner/default.jpg" style="height: 220px; max-width: 525px;"/>
                        <?php
                    } else {
                        foreach ($banner as $data) {
                            ?>
                            <img src="/file/banner/<?php echo $data['path']; ?>" style="height: 220px;max-width: 525px;" />
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="Center-Container is-Inline-logo">
                <div class="Center-Block">
                    <?php
                    if ($model->logo != null) {
                        ?>
                        <img src="/file/logo/<?php echo $model->logo; ?>" style="float: right;" width="220" class="Center-Block Absolute-Center is-Image" />
                        <?php
                    } else {
                        ?>
                        <img src="/file/logo/default.jpg" style="float: right;" width="220" class="Center-Block Absolute-Center is-Image"/>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>


        
        <div class="servicebox"  >

            <h2>
                <img src="/img/icontopic.png" />
                <?php
                echo Yii::t('language', 'ข้อมูลของบริษัท');
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::button(
                            Yii::t('language', 'แก้ไข'), array(
                        'class' => "grey right", // btnedit grey
                        'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/serviceProvider/manage/insertCompany/id/' . $model->id
                        )) . "'")
                    );
                }
                ?>

                <span class="right" style=" font-size: 13px;
    margin-top: 3px; cursor:pointer; z-index: 9999; ">
                    <i class="icon-star" style="color: goldenrod;"></i> 
                <span id="reply"> เก็บเข้ารายการโปรด</span>
                <span></span>
            </h2>

            <table>
                <tr>
                    <td><?php echo Yii::t('language', 'ชื่อบริษัท'); ?></td>
                    <td class="colon"> : </td>
                    <td>
                        <?php
                        //$name = LanguageHelper::changeDB($model->name, $model->name_en); //ย้ายไปอยู่ด้านบน เพื่อเรียกใช้ในหัวข้อด้วย
                        echo $name;
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><?php echo Yii::t('language', 'ประเภทผู้ให้บริการ'); ?></td>
                    <td class="colon"> : </td>
                    <td>
                        <?php
                        $type = SpTypeCom::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                        foreach ($type as $data) {
                            $type_name = SpTypeBusiness::model()->find('id=:id', array(':id' => $data['type_id']));
                            $type_name = LanguageHelper::changeDB($type_name->name, $type_name->name_en);
                            $data_type .= $type_name . ', ';
                        }
                        echo rtrim($data_type, ', ');
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo Yii::t('language', 'ที่ตั้ง'); ?></td>
                    <td class="colon"> : </td>
                    <td>
                        <?php
                        $address = LanguageHelper::changeDB($model->address, $model->address_en);
                        echo $address;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo Yii::t('language', 'เว็บไซต์'); ?></td>
                    <td class="colon"> : </td>
                    <td><?php echo $model->website; ?></td>
                </tr>
                <?php
                $brochure = SpBrochure::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                if ($brochure > 0) { 
                    ?>
                    <tr>
                        <td><?php echo Yii::t('language', 'โบรชัวร์'); ?></td>
                    <td class="colon"> : </td>
                        <td>
                            <?php
                            $brochure = SpBrochure::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                            echo "<ul>";
                            foreach ($brochure as $data) {
                                echo "<li>";
                                echo CHtml::link($data['path'], array(
                                    '/serviceProvider/default/readingFile/', 'id' => $data['brochure_id'], 'type' => 'brochure'), array(
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
            <p style="padding: 10px 0px">
                <?php
                $infor = LanguageHelper::changeDB($model->infor, $model->infor_en);
                echo $infor;
                ?>
            </p>
        </div>
        <?php
        $dp_product_best_sell = new CActiveDataProvider('SpProduct', array(
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
            <div class="servicebox clearfix">
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
        $dp_product_promo = new CActiveDataProvider('SpProduct', array(
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
            <div class="servicebox clearfix" >
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
        $dp_product_new = new CActiveDataProvider('SpProduct', array(
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
            <div class="servicebox">
                <h2><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'สินค้าใหม่'); ?></h2>
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
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/default/index/id/' . $type_business_back
                )) . "'")
            );
            if (Yii::app()->user->isAdmin()) {
                echo CHtml::button(Yii::t('language', 'ย้อนกลับจัดการพาร์ทเนอร์'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/serviceProvider/manage/company'
                    )) . "'")
                );
            }
            ?>
            <hr>
        </div>
    </div>
</div>