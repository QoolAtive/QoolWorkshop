<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead" style="background: url('<?php echo Yii::t('language', '/img/iconpage/serviceprovider.png'); ?>'); background-size: 227px; margin-left: -1px; " ></li>

            <li class="servicedata">
                <p>
                    <?php
//                  echo Yii::t('language', 'Memeber Since') . ' ' ;
//                  echo Tool::ChangeDateTimeToShow($model_count->update_at) . ' ' ;
                    echo Yii::t('language', 'จำนวนการเข้าชม') . ' : ' . $model_count->count_company_view;
                    ?>
                </p>
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

            <?php if (isset(Yii::app()->user->id)) { ?>
                <span id="select_service" class="right" style="font-size: 12px; padding: 3px 5px;">
                    <i class="icon-star" style="color: goldenrod;"></i> 
                    <?php
                    $countSpLog = SpLog::model()->count('user_id = :user_id and service_company_id  = :service_company_id ', array(
                        ':user_id' => Yii::app()->user->id,
                        ':service_company_id' => $model->id,
                    ));
                    if ($countSpLog > 0) {
                        echo CHtml::link(Yii::t('language', 'เก็บเข้าบริการโปรดแล้ว', '#'));
                    } else {
                        echo CHtml::ajaxLink(
                                Yii::t('language', 'เก็บเข้าบริการโปรด'), Yii::app()->createUrl('/serviceProvider/default/insertLog'), array(
                            'type' => 'POST',
//                        'beforeSend' => "function( request )
//                                        {
//                                          // Set up any pre-sending stuff like initializing progress indicators
//                                        }",
                            'success' => "function( data )
                                    {
                                      alert( data );
                                    }",
                            'data' => array(
                                'sp_id' => $model->id,
                            ),
                            array(//htmlOptions
                                'href' => Yii::app()->createUrl('serviceProvider/default/insertLog'),
                            ),
//                            'update' => 'span#select_service',
                        ));
                    }
                    ?>
                </span>
            <?php } ?>
        </h3>
        <div class="clearfix servicebanner">
            <div style="float: left; width: 525px; height: 220px; ">





  
  
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

                    $banner = SpBanner::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                    if ($banner == null) {
                        ?>

<li><a href="<?php echo $link; ?> " target="_bank"><img src="/file/banner/default.jpg" style="height: 220px; max-width: 525px;" /></a></li>
<li><a href="<?php echo $link; ?> " target="_bank"><img src="/file/banner/default.jpg" style="height: 220px; max-width: 525px;" /></a></li>
<li><a href="<?php echo $link; ?> " target="_bank"><img src="/file/banner/default.jpg" style="height: 220px; max-width: 525px;" /></a></li>

                    
                        <?php

                    } else {
                        foreach ($banner as $data) {
                            ?>
<li><img src="/file/banner/<?php echo $data['path']; ?>" style="height: 220px;max-width: 525px;" /></li>
<?php
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
        <div class="servicebox"  >

            <h2>
                <img src="/img/icontopic.png" />
                <?php
                echo Yii::t('language', 'ข้อมูลของบริษัท');
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::button(
                            Yii::t('language', 'แก้ไข'), array(
                        'class' => "grey", // btnedit grey
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
                    <td>
                        <?php
                        echo CHtml::link($link, $link, array('target' => '_bank'));
                        ?>
                    </td>
                </tr>
                <?php
                $brochure = SpBrochure::model()->count('com_id=:com_id', array(':com_id' => $model->id));
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