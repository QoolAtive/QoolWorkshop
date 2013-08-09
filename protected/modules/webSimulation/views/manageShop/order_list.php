<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php
                    $shop_name = WebShop::model()->findByPk($model->web_shop_id)->name_th;
                    echo Yii::t('language', 'ร้าน ') . $shop_name;
                    ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รายการสั่งซื้อ'); ?>
            </span>
        </h3>
        <?php
        $dataProvider = $model->search();
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'order-list-grid',
            'dataProvider' => $dataProvider,
            'filter' => $model,
            'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
            'pagerCssClass' => 'alignCenter',
            'ajaxUpdate' => true,
            'columns' => array(
                array(
                    'header' => Yii::t('language', 'ลำดับ'),
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
                ),
                array(
                    'header' => Yii::t('language', 'วันที่สั่ง'),
                    'name' => 'order_at',
                    'value' => 'Tool::ChangeDateTimeToShow($data->order_at)',
                    'filter' => FALSE,
                ),
                array(
                    'header' => Yii::t('language', 'ชื่อลูกค้า'),
                    'name' => 'customer_name',
                ),
                array(
                    'header' => Yii::t('language', 'สถานะการส่ง'),
                    'name' => 'status',
                    'value' => '$data->status == 0 ? "ยังไม่ได้ส่ง" : "ส่งแล้ว"',
                    'filter' => array('0' => 'ยังไม่ได้ส่ง', '1' => 'ส่งแล้ว'),
                ),
                array(
                    'header' => Yii::t('language', 'ราคารวม (บาท)'),
                    'name' => 'price_all',
                    'filter' => FALSE,
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "รายละเอียด"),
                    'template' => '{view}',
                    'buttons' => array(
                        'view' => array(
                            'label' => Yii::t('language', 'ดูรายละเอียด'),
                            'url' => 'CHtml::normalizeUrl(array("/webSimulation/manageShop/orderDetail", "order_id"=> $data->web_shop_order_id))',
                        ),
                    ),
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "ลบ"),
                    'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
                    'template' => '{delete}',
                    'buttons' => array(
                        'delete' => array(
                            'label' => Yii::t('language', 'ลบ'),
                            'url' => 'CHtml::normalizeUrl(array("/webSimulation/manageShop/deleteOrder", "order_id"=> $data->web_shop_order_id))',
                        ), //end 'delete' => array(
                    ), //end 'buttons' => array(
                ),
            ), //end 'columns' => array(
            'template' => "{items}\n{pager}",
            'pager' => array(
                'class' => 'CLinkPager',
                'header' => Yii::t('language', 'หน้าที่: '),
                'firstPageLabel' => Yii::t('language', 'หน้าแรก'),
                'prevPageLabel' => Yii::t('language', 'ก่อนหน้า'),
                'nextPageLabel' => Yii::t('language', 'หน้าถัดไป'),
                'lastPageLabel' => Yii::t('language', 'หน้าสุดท้าย'),
            )
        ));
        ?>
    </div>
</div>
