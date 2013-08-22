<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead">
                <img src="<?php echo Yii::t('language', '/img/iconpage/edir.png'); ?>"/>
            </li>
            <?php
            $model_them = CompanyThem::model()->find('main_id=:main_id', array(':main_id' => $model->id));
            if (Yii::app()->user->isAdmin() && $model_them->status_appro == 0) {
                ?>
                <li style="color: #fff;  background: url(/img/edir-leftbg.png) no-repeat; height: 138px; width: 225px;">
                    <p>
                        <?php
//                    echo Yii::t('language', 'Memeber Since') . ' ' ;
//                  echo Tool::ChangeDateTimeToShow($model_count->update_at) . ' ' ;
                        echo Yii::t('language', 'ข้อมูลผู้ร้องขอ');
                        ?>
                    </p>
                    <table style=" color: #fff; display: block;
                           margin-left: 10px;
                           margin-top: 20px;">
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
                            <td>:</td>
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
            <li style="color: #fff;  background: url(/img/edir-leftbg.png) no-repeat; height: 138px; width: 225px;">
                <p>
                    <?php
//                    echo Yii::t('language', 'Memeber Since') . ' ' ;
//                  echo Tool::ChangeDateTimeToShow($model_count->update_at) . ' ' ;
                    echo Yii::t('language', 'จำนวนการเข้าชม') . ' : ' . $count['count'];
                    ?>
                </p>
                <p>
                    <?php
                    echo Yii::t('language', 'สร้าง') . ' : ' . $create->create_at;
                    ?>
                </p>
                <table style=" color: #fff; display: block;
                       margin-left: 10px;
                       margin-top: 20px;">
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
                <?php
                if ($model->facebook != null) {
                    echo CHtml::link(CHtml::image('/images/facebook.png', ''), $model->facebook, array('target' => '_bank'));
                }
                if ($model->twitter != null) {
                    echo CHtml::link(CHtml::image('/images/twitter.png', ''), $model->twitter, array('target' => '_bank'));
                }
                ?>
            </li>
        </ul>

    </div>
</div>
<div class="content">
    <div class="tabcontents" >
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
        <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 5px 15px;">
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
                    <td> : </td>
                    <td>
                        <?php
                        $name = LanguageHelper::changeDB($model->name, $model->name_en);
                        echo $name;
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><?php echo Yii::t('language', 'ประเภทร้านค้า'); ?></td>
                    <td> : </td>
                    <td>
                        <?php
                        $type = CompanyType::model()->findAll('company_id=:company_id', array(':company_id' => $model->id));
                        foreach ($type as $data) {
                            $type_name = CompanyTypeBusiness::model()->find('id=:id', array(':id' => $data['company_type']));
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
                    <td>
                        <?php
                        $address = LanguageHelper::changeDB($model->address, $model->address_en);
                        echo $address;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo Yii::t('language', 'เว็บไซต์'); ?></td>
                    <td> : </td>
                    <td><?php echo $model->website; ?></td>
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
            <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'สินค้าขายดี'); ?></h2>
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
            <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'โปรโมชั่น'); ?></h2>
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
            <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'สินค้าใหม่'); ?></h2>
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
        </div>
    </div>
</div>