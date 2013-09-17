<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead" style="background: url('<?php echo Yii::t('language', '/img/iconpage/edir.png'); ?>'); background-size: 227px; margin-left: -1px; " ></li>

            <?php
            $model_them = CompanyThem::model()->find('main_id=:main_id', array(':main_id' => $model->id));
            if (Yii::app()->user->isAdmin() && $model_them->status_appro == 0) {
                ?>
                <li style=" background: url(/img/edir-leftbg.png) no-repeat scroll 0 0 / 225px auto transparent;
                    color: #FFFFFF;
                    height: 138px;
                    padding-left: 10px;
                    padding-top: 10px;
                    width: 224px;">
                    <p>
                        <?php
//                    echo Yii::t('language', 'Memeber Since') . ' ' ;
//                  echo Tool::ChangeDateTimeToShow($model_count->update_at) . ' ' ;
                        echo Yii::t('language', 'ข้อมูลผู้ร้องขอ');
                        ?>
                    </p>
    <!--                    <table style=" color: #fff; display: block;
                           margin-left: 10px;
                           margin-top: 20px;">-->
                    <table>
                        <tr>
                            <td><?php echo Yii::t('language', 'ชื่อ'); ?></td>
                            <td> : </td>
                            <td>
                                <?php
                                $model_profile = MemRegistration::model()->find('user_id = :user_id', array(':user_id' => $model->user_id));
                                $name = LanguageHelper::changeDB($model_profile->ftname, $model_profile->fename);
                                $ltname = LanguageHelper::changeDB($model_profile->ltname, $model_profile->lename);
                                echo $name . ' ' . $ltname;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo Yii::t('language', 'อีเมล์'); ?></td>
                            <td> : </td>
                            <td><?php echo $model_profile->email; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo Yii::t('language', 'โทรสาร.'); ?></td>
                            <td> : </td>
                            <td><?php echo $model_profile->fax; ?></td>
                        </tr>
                        <tr> <td><?php echo Yii::t('language', 'โทร.'); ?></td>
                            <td> : </td>
                            <td><?php echo $model_profile->tel; ?></td>
                        </tr>
                    </table>
                </li>
            <?php } ?>
            <li class="servicedata">
                <div class="clearfix">
                    <p class="left" style="padding:10px 10px;"><i class="icon-eye-open"></i>
                        <?php
//                    echo Yii::t('language', 'Memeber Since') . ' ' ;
//                  echo Tool::ChangeDateTimeToShow($model_count->update_at) . ' ' ;
                        // echo Yii::t('language', 'จำนวนการเข้าชม') . ' : ' . $count['count'];
                        echo ' : ' . $count['count'];
                        ?>
                    </p>

                    <p class="right" style="padding:10px 10px;">
                        <?php
                        $date_create = explode('-', $create->create_at);
                        $y = $date_create[0] + 543;
                        echo Yii::t('language', 'สร้าง') . ' : ' . $date_create[2] . '/' . $date_create[1] . '/' . $y;
                        ?>
                    </p>
                </div>
                <div style="padding: 2px 10px;">
                    <table width="100">
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
                            <td>:</td>
                            <td><?php echo $model->contact_email; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo Yii::t('language', 'โทรสาร.'); ?></td>
                            <td> : </td>
                            <td><?php echo $model->contact_fax; ?></td>
                        </tr>
                        <tr> 
                            <td><?php echo Yii::t('language', 'โทร.'); ?></td>
                            <td> : </td>
                            <td><?php echo $model->contact_tel; ?></td>
                        </tr>
                    </table>
                </div>


            </li>
        </ul>
        <?php
        if ($model->facebook != null) {
            echo CHtml::link(CHtml::image('/images/facebook.png', ''), $model->facebook, array('target' => '_bank'));
        }
        if ($model->twitter != null) {
            echo CHtml::link(CHtml::image('/images/twitter.png', ''), $model->twitter, array('target' => '_bank'));
        }
        ?>
    </div>
</div>
<div class="content">
    <?php
    $company_name = LanguageHelper::changeDB($model->name, $model->name_en);
    ?>
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-compass"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/eDirectory/default/index")); ?>">
                    <?php echo Yii::t('language', 'ร้านค้าทั้งหมด'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo $company_name; ?>
            </span>
        </h3>


        <div class="clearfix servicebanner">

            <div class="shopbannerleft" style="width:525px;float:left;">
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

<div class="imageright">

                  <?php
                        if ($model->logo != null) {
                            ?>
                            <a href="<?php echo $link; ?> " target="_bank"><img  src="http://dbdmart.com/file/logo/<?php echo $model->logo;?>" /></a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo $link; ?> " target="_bank"><img   src="http://dbdmart.com/file/logo/default.jpg"/></a>
                            <?php
                        }
                        ?>




 
       
              </div>
            </div>

        <div class="edirbox clearfix">
            <h2>
                <img src="/img/icontopic.png" />
                <?php
                echo Yii::t('language', 'ข้อมูลของบริษัท');
                if ($model->user_id == Yii::app()->user->id) {
                    echo CHtml::button(
                            Yii::t('language', 'แก้ไข'), array(
                        'class' => "grey right", // btnedit grey
//                        'style' => 'margin-left: 656px; margin-top: 5px; position:absolute;',
                        'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/eDirectory/admin/insertCompany/id/' . $model->id . '/page/detail'
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
                        $name = LanguageHelper::changeDB($model->name, $model->name_en);
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
                        <td class="colon"> : </td>
                        <td>
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
            <div class="ckfix">
                <?php
                $infor = LanguageHelper::changeDB($model->infor, $model->infor_en);
                echo $infor;
                ?>
            </div>
        </div>


        <?php
        $dp_product_best_sell = new CActiveDataProvider('CompanyProduct', array(
            'criteria' => array(
                'condition' => 'guide = 1 and main_id = ' . $model->id,
                'order' => 'date_write desc, id desc',
            ),
            'pagination' => array(
                'pageSize' => 5,
            ),
        ));
        if ($dp_product_best_sell->itemCount > 0) {
            ?>
            <div class="edirbox">
                <h2><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'สินค้าขายดี'); ?></h2>
                <div class="clearfix">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dp_product_best_sell,
                        'itemView' => 'list_product',
                        'summaryText' => false,
                        'viewData' => array('user_id' => $model->user_id),
                    ));
                    ?>
                </div>
            </div>

            <?php
        }
        $dp_product_promo = new CActiveDataProvider('CompanyProduct', array(
            'criteria' => array(
                'condition' => 'guide = 2 and main_id = ' . $model->id,
                'order' => 'date_write desc, id desc',
            ),
            'pagination' => array(
                'pageSize' => 5,
            ),
        ));
        if ($dp_product_promo->itemCount > 0) {
            ?>
            <div class="edirbox">
                <h2><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'โปรโมชั่น'); ?></h2>
                <div class="clearfix">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dp_product_promo,
                        'itemView' => 'list_product',
                        'summaryText' => false,
                        'viewData' => array('user_id' => $model->user_id),
                    ));
                    ?>
                </div>
            </div>
            <?php
        }
        $dp_product_new = new CActiveDataProvider('CompanyProduct', array(
            'criteria' => array(
                'condition' => 'main_id = ' . $model->id,
                'order' => 'date_write desc, id desc',
            ),
            'pagination' => array(
                'pageSize' => 5,
            ),
        ));
        if ($dp_product_new->itemCount > 0) {
            ?>
            <div class="edirbox">
                <h2><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'สินค้าใหม่'); ?></h2>
                <div class="clearfix">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dp_product_new,
                        'itemView' => 'list_product',
                        'summaryText' => false,
                        'viewData' => array('user_id' => $model->user_id),
                    ));
                    ?>
                </div>
            </div>
        <?php } ?>
        <div class="textcenter">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/default/index'
                )) . "'")
            );
            if (Yii::app()->user->isAdmin()) {
//                $model_them = CompanyThem::model()->find('main_id=:main_id', array(':main_id' => $model->id));
                if ($model_them->status_appro == 0) {
                    echo CHtml::button(Yii::t('language', 'ยืนยันร้านค้า'), array(
                        'onclick' => "if(confirm('" . Yii::t('language', 'คุณต้องการยืนยันร้านค้าหรือไม่?') . "')) window.location='" . CHtml::normalizeUrl(array('/eDirectory/admin/companyComfirm/id/' . $model->id)) . "'")
                    );
                }
                echo CHtml::button(Yii::t('language', 'ร้านค้าทั้งหมด'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/eDirectory/admin/index'
                    )) . "'")
                );
                echo CHtml::button(Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/eDirectory/admin/companyWaiting'
                    )) . "'")
                );
            } else {
                
            }
            ?>
            <hr>

        </div>  </div>  

</div>