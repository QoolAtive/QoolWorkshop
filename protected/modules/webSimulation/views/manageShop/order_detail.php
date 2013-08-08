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
                    $shop_name = WebShop::model()->findByPk($order->web_shop_id)->name_th;
                    echo Yii::t('language', 'ร้าน ') . $shop_name;
                    ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/order")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รายการสั่งซื้อ'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'รายละเอียด') . Yii::t('language', 'รายการสั่งซื้อ'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'order_detail-form',
        ));
        ?>
        <div class="right">
            <div class="_33">
                สถานะการส่ง
            </div>
            <div class="_33">
                <?php
                echo CHtml::dropDownList('status', $order['status'], array('0' => 'ยังไม่ได้ส่ง', '1' => 'ส่งแล้ว'));
                ?>
            </div>
            <div class="_33">
                <?php
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array(
                    'class' => "purple",
                ));
                ?>
            </div>
        </div>
        <div class="_33">
            ชื่อลูกค้า <?php echo $order['customer_name']; ?>
        </div>
        <div class="_33">
            อีเมล์ลูกค้า <?php echo $order['customer_email']; ?>
        </div>
        <div class="_33">
            เบอร์โทรลูกค้า <?php echo $order['customer_tel']; ?>
        </div>

        <?php
        $dataProvider = $item->search();
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'order_detail-grid',
            'dataProvider' => $dataProvider,
//            'filter' => $item,
            'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
            'pagerCssClass' => 'alignCenter',
            'ajaxUpdate' => true,
            'columns' => array(
                array(
                    'header' => Yii::t('language', 'ลำดับ'),
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
                ),
                array(
                    'header' => Yii::t('language', 'ชื่อสินค้า'),
                    'value' => 'WebShopItem::model()->findByPk($data->web_shop_item_id)->name_th',
                ),
                array(
                    'header' => Yii::t('language', 'จำนวน'),
                    'name' => 'amount',
                ),
                array(
                    'header' => Yii::t('language', 'ราคา'),
                    'name' => 'price',
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
        <?php $this->endWidget(); ?>
    </div>
</div>