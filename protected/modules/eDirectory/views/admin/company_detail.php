<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead">
                <img src="<?php echo Yii::t('language', '/img/iconpage/serviceprovider.png'); ?>"/>
            </li>
            <li style="color: #fff;  background: url(/img/edir-leftbg.png) no-repeat; height: 138px; width: 225px;">
                <p>
                    <?php
//                    echo Yii::t('language', 'Memeber Since') . ' ' ;
//                  echo Tool::ChangeDateTimeToShow($model_count->update_at) . ' ' ;
                    echo Yii::t('language', 'จำนวนการเข้าชม') . ' ' . $model_count->count_company_view;
                    ?>
                </p>
                <table style=" color: #fff; display: block;
                       margin-left: 10px;
                       margin-top: 20px;">
                    <tr>
                        <td><?php echo Yii::t('language', 'ผู้ร้องขอ'); ?></td>
                        <td> : </td>
                        <td>
                            <?php
                            $name = LanguageHelper::changeDB($model->ftname, $model->ftname_en);
                            $ltname = LanguageHelper::changeDB($model->ltname, $model->ltname_en);
                            echo $name . ' ' . $ltname;
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
                    <tr> <td><?php echo Yii::t('language', 'โทร.'); ?></td>
                        <td> : </td>
                        <td><?php echo $model->contact_tel; ?></td>
                    </tr>
                </table>
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
        <div class="clearfix" style="border: 1px solid #e0e0e0; height: 220px; display: inline-block; width: 100%;">

            <div id="featured" > 
                <?php
                $banner = SpBanner::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
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
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::button(
                            Yii::t('language', 'แก้ไข'), array(
                        'class' => "grey", // btnedit grey
                        'style' => 'margin-left: 656px; margin-top: 5px; position:absolute;',
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
                    <td>
                        <?php
                        $name = LanguageHelper::changeDB($model->name, $model->name_en);
                        echo $name;
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><?php echo Yii::t('language', 'ประเภทผู้ให้บริการ'); ?></td>
                    <td> : </td>
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
                    <td> : </td>
                    <td>
                        <?php
                        $address = LanguageHelper::changeDB($type_name->address, $type_name->address_en);
                        echo $address;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo Yii::t('language', 'เว็บไซต์'); ?></td>
                    <td> : </td>
                    <td><?php echo $model->website; ?></td>
                </tr>
                <?php if ($model->brochure) { ?>
                    <tr>
                        <td><?php echo Yii::t('language', 'โบรชัวร์'); ?></td>
                        <td> : </td>
                        <td>
                            <?php
                            echo CHtml::link('ดาวน์โหลด', array(
                                '/serviceProvider/default/readingPdf/', 'id' => $model->id), array(
                                'target' => '_bank'
                            ));
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