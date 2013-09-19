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
                    echo Yii::t('language', 'ร้าน :n', array(':n' => $shop_name));
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
            'summaryText' => '',
            'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
            'columns' => array(
                array(
                    'header' => Yii::t('language', 'ลำดับ'),
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
                ),
                array(
//                    'header' => Yii::t('language', 'วันที่สั่ง'),
                    'name' => 'order_at',
                    'value' => 'Tool::ChangeDateTimeToShow($data->order_at, 2)',
                    'filter' => FALSE,
                ),
                array(
//                    'header' => Yii::t('language', 'ชื่อลูกค้า'),
                    'name' => 'customer_name',
                ),
                array(
//                    'header' => Yii::t('language', 'สถานะการส่ง'),
                    'name' => 'status',
                    'value' => 'getStatus($data->status)',
                    'filter' => array(
                        '0' => Yii::t('language', 'ยังไม่ชำระเงิน'),
                        '1' => Yii::t('language', 'การชำระเงินสมบูรณ์แล้ว'),
                        '2' => Yii::t('language', 'กำลังดำเนินการ'),
                        '3' => Yii::t('language', 'จัดส่งเรียบร้อยแล้ว'),
                    ),
                ),
                array(
//                    'header' => Yii::t('language', 'ราคารวม (บาท)'),
                    'name' => 'price_all',
                    'value' => 'number_format($data->price_all, 2)',
                    'htmlOptions' => array('style' => 'text-align: right;'),
                    'filter' => FALSE,
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "เครื่องมือ"),
                    'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
                    'template' => '{view}&nbsp;|&nbsp;{delete}',
                    'buttons' => array(
                        'view' => array(
                            'label' => Yii::t('language', 'ดูรายละเอียด'),
                            'url' => 'CHtml::normalizeUrl(array("/webSimulation/manageShop/orderDetail", "order_id"=> $data->web_shop_order_id))',
                        ),
                        'delete' => array(
                            'label' => Yii::t('language', 'ลบ'),
                            'url' => 'CHtml::normalizeUrl(array("/webSimulation/manageShop/deleteOrder", "order_id"=> $data->web_shop_order_id))',
                        ),
                    ),
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

<?php

function getStatus($index) {
    switch ($index) {
        case 1: $role = Yii::t('language', 'การชำระเงินสมบูรณ์แล้ว');
            break;
        case 2: $role = Yii::t('language', 'กำลังดำเนินการ');
            break;
        case 3: $role = Yii::t('language', 'จัดส่งเรียบร้อยแล้ว');
            break;
        default: $role = Yii::t('language', 'ยังไม่ชำระเงิน');
            break;
    }
    return $role;
}
?>