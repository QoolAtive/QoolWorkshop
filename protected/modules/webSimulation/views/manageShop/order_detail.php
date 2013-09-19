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
                    echo Yii::t('language', 'ร้าน :n', array(':n' => $shop_name));
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
                <?php echo Yii::t('language', 'รายละเอียด') . " " . Yii::t('language', 'รายการสั่งซื้อ'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'order_detail-form',
        ));
        ?>
        <div class="_50">
            <b><?php echo Yii::t('language', 'รายละเอียดลูกค้า') . ' : '; ?></b>
            <table style="width: 60%">
                <tr>
                    <td style="width: 50%"><?php echo Yii::t('language', 'ชื่อ') . ' : '; ?></td>
                    <td style="width: 50%"><?php echo $order['customer_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo Yii::t('language', 'อีเมล์') . ' : '; ?></td>
                    <td><?php echo $order['customer_email']; ?></td>
                </tr>
                <tr>
                    <td><?php echo Yii::t('language', 'โทร.') . ' : '; ?></td>
                    <td><?php echo $order['customer_tel']; ?></td>
                </tr>
            </table>
        </div>

        <div class="_50 right">
            <div class="_25">
                <?php Yii::t('language', 'สถานะการส่ง') . ' : '; ?>
            </div>
            <div class="_50">
                <?php
                echo CHtml::dropDownList('status', $order['status'], array(
                    '0' => Yii::t('language', 'ยังไม่ชำระเงิน'),
                    '1' => Yii::t('language', 'การชำระเงินสมบูรณ์แล้ว'),
                    '2' => Yii::t('language', 'กำลังดำเนินการ'),
                    '3' => Yii::t('language', 'จัดส่งเรียบร้อยแล้ว'),
                ));
                ?>
            </div>
            <div class="_25">
                <?php
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array(
                    'class' => "purple",
                ));
                ?>
            </div>
        </div>
        <?php
        $dataProvider = $item->search();
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'order_detail-grid',
            'dataProvider' => $dataProvider,
//            'filter' => $item,
            'summaryText' => '',
            'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
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
//                    'header' => Yii::t('language', 'จำนวน(ชิ้น)'),
                    'header' => Yii::t('language', 'จำนวน') . '<br />' . Yii::t('language', '(ชิ้น)'),
                    'name' => 'amount',
                    'value' => 'number_format($data->amount, 0)',
                    'htmlOptions' => array('style' => 'text-align: center;'),
                ),
                array(
                    'header' => Yii::t('language', 'ราคา') . '<br />' . Yii::t('language', '(บาท/ชิ้น)'),
                    'name' => 'price)',
                    'value' => 'number_format($data->price, 2)',
                    'htmlOptions' => array('style' => 'text-align: right;'),
                ),
                array(
                    'header' => Yii::t('language', 'ราคารวม') . '<br />' . Yii::t('language', '(บาท)'),
                    'value' => 'number_format($data->price*$data->amount, 2)',
                    'type' => 'raw',
                    'htmlOptions' => array('style' => 'text-align: right;'),
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

        <div class="txt-cen" style="font-weight: bold;">
            <?php echo Yii::t('language', 'ราคารวม') . ' : ' . number_format($order['price_all'], 2) . ' ' . Yii::t('language', 'บาท'); ?> 
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
