<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead">
                <img src="/img/iconpage/edir.png"/>
            </li>
            <li style="color: #fff;  background: url(/img/edir-leftbg.png) no-repeat; height: 138px; width: 225px;">
                <p>
                    <?php
                    echo Yii::t('language', 'Memeber Since') . ' ' .
//                    Tool::ChangeDateTimeToShow($model_count->update_at) . ' ' .
                    Yii::t('language', 'View') . ' ' . $model_count->count_company_view;
                    ?>
                </p>
                <table style=" color: #fff; display: block;
                       margin-left: 10px;
                       margin-top: 20px;">
                    <tr>
                        <td><?php echo Yii::t('language', 'Name'); ?></td>
                        <td> : </td>
                        <td><?php echo $model->contact_name; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('language', 'E-mail'); ?></td>
                        <td>:</td>
                        <td><?php echo $model->contact_email; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Yii::t('language', 'Fax'); ?></td>
                        <td> : </td>
                        <td><?php echo $model->contact_fax; ?></td>
                    </tr>
                    <tr> <td><?php echo Yii::t('language', 'Tel'); ?></td>
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
        <div style="border: 1px solid #e0e0e0; display: inline-block; width: 100%;">

            <div id="featured"> 
                <img src="/img/link/qoolative.jpg" data-caption="#htmlCaption"  alt="Overflow: Hidden No More" />
                <img src="/img/link/qoolative.jpg"  alt="HTML Captions" />
                <img src="/img/link/qoolative.jpg" alt="and more features" />
            </div>
            <img src="/img/link/qoolative.jpg" style="float: right;" width="220">

        </div>
        <h2>
            <img src="/img/icontopic.png" />
            <?php
            echo Yii::t('language', 'Company Profile');
            if (Yii::app()->user->isAdmin()) {
                echo CHtml::button(Yii::t('language', 'แก้ไข'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/serviceProvider/manage/insertCompany/id/' . $model->id
                    )) . "'")
                );
            }
            ?>
        </h2>
        <table>
            <tr>
                <td>
                    <?php
                    echo Yii::t('language', 'Company name');
                    ?>
                </td>
                <td> : </td>
                <td><?php echo $model->name; ?></td>
            </tr>

            <tr>
                <td><?php echo Yii::t('language', 'Business type'); ?></td>
                <td> : </td>
                <td>
                    <?php
                    $type = SpTypeCom::model()->findAll('com_id=:com_id', array(':com_id' => $model->id));
                    foreach ($type as $data) {
                        $type_name = SpTypeBusiness::model()->find('id=:id', array(':id' => $data['type_id']));
                        $data_type .= $type_name->name . ', ';
                    }
                    echo rtrim($data_type, ', ');
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo Yii::t('language', 'Address'); ?></td>
                <td> : </td>
                <td><?php echo $model->address; ?></td>
            </tr>
            <tr>
                <td><?php echo Yii::t('language', 'Website'); ?></td>
                <td> : </td>
                <td><?php echo $model->website; ?></td>
            </tr>
            <?php if ($model->brochure) { ?>
                <tr>
                    <td><?php echo Yii::t('language', 'Download Brochure'); ?></td>
                    <td> : </td>
                    <td><?php echo CHtml::link('ดาวน์โหลด', array('/serviceProvider/default/readingPdf/', 'id' => $model->id), array('target' => '_bank')); ?></td>
                </tr>
            <?php } ?>

        </table>
        <?php echo $model->infor; ?>

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
            <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'ขายดี'); ?></h2>
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
            <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'ล่าสุด'); ?></h2>
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
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/default/index/id/' . $type_business_back
                )) . "'")
            );
            ?>
        </div>
    </div>
</div>