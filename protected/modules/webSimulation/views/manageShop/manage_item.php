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
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopItem")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าในร้าน'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รายการสินค้า'); ?>
            </span>
        </h3>
        <div class="txt-cen clearfix">
                <!--<hr>-->
                <?php
                echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'สินค้า'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/editItem")) . '"'));
                ?>
                <hr>
            </div>
        <?php
        $shop_category = ShopCategory::getList();
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
                    'header' => Yii::t('language', 'ชื่อสินค้า'),
                    'name' => 'name_th',
                ),
                array(
                    'header' => Yii::t('language', 'หมวดหมู่สินค้า'),
                    'name' => 'category',
                    'value' => 'ShopCategory::getCategory($data->category)',
                    'filter' => $shop_category,
                ),
                array(
                    'header' => Yii::t('language', 'ราคาปกติ'),
                    'name' => 'price_normal',
                    'filter' => FALSE,
                ),
                array(
                    'header' => Yii::t('language', 'ราคาพิเศษ'),
                    'name' => 'price_special',
                    'filter' => FALSE,
                ),
//                array(
//                    'class' => 'CButtonColumn',
//                    'header' => Yii::t('language', "รายละเอียด"),
//                    'template' => '{view}',
//                    'buttons' => array(
//                        'view' => array(
//                            'label' => Yii::t('language', 'ดูรายละเอียด'),
//                            'url' => 'CHtml::normalizeUrl(array("/webSimulation/manageShop/itemDetail", "item_id"=> $data->web_shop_item_id))',
//                        ),
//                    ),
//                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "แก้ไข"),
                    'template' => '{update}',
                    'buttons' => array(
                        'update' => array(
                            'label' => Yii::t('language', 'แก้ไข'),
                            'url' => 'CHtml::normalizeUrl(array("/webSimulation/manageShop/editItem", "item_id"=> $data->web_shop_item_id))',
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
                            'url' => 'CHtml::normalizeUrl(array("/webSimulation/manageShop/deleteItem", "item_id"=> $data->web_shop_item_id))',
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
