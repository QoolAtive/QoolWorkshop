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
                echo '<label style = "color: red;">' . Yii::t('language', '*ร้านค้าของคุณยังไม่ได้รับการยืนยันจากผู้ดูแลระบบ ร้านค้าของคุณจะยังไม่ได้รับการเพิ่มข้อมูลเข้าสู่ระบบร้านค้า') . '</label>';
            }
            ?>
            <div style = "border: 1px solid #e0e0e0; display: inline-block; width: 100%;">

                <div id = "featured">
                    <img src = "/img/link/qoolative.jpg" data-caption = "#htmlCaption" alt = "Overflow: Hidden No More" />
                    <img src = "/img/link/qoolative.jpg" alt = "HTML Captions" />
                    <img src = "/img/link/qoolative.jpg" alt = "and more features" />
                </div>
                <img src = "/img/link/qoolative.jpg" style = "float: right;" width = "220">

            </div>
            <h2>
                <img src = "/img/icontopic.png" />
                <?php
                echo Yii::t('language', 'Company Profile');
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
                        $type = CompanyType::model()->findAll('company_id=:company_id', array(':company_id' => $model->id));
                        foreach ($type as $data) {
                            $type_name = SpTypeBusiness::model()->find('id=:id', array(':id' => $data['company_type']));
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
                <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'ขายดี'); ?></h2>
                <div class="clearfix">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dp_product_best_sell,
                        'itemView' => 'list_product',
                        'summaryText' => false,
                        'viewData' => array(
                            'id' => $model->id
                        ),
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
                        'viewData' => array(
                            'id' => $model->id
                        ),
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
                <h2><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'ล่าสุด'); ?></h2>
                <div class="clearfix">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dp_product_new,
                        'itemView' => 'list_product',
                        'summaryText' => false,
                        'viewData' => array(
                            'id' => $model->id
                        ),
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
            <?php
        }
        ?>
    </div>
</div>
