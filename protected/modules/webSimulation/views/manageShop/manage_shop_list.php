<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopList")); ?>">
                    <?php echo Yii::t('language', 'รายการร้านค้าของคุณ'); ?>
                </a>
            </span>
        </h3>
        <div class="txt-cen">
            <hr>
            <?php
//        $shops = WebShop::model()->findAll(array('condition' => 'mem_user_id = ' . $user_id));
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ร้านค้า'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/register")) . '"'));
            ?>
            <hr>
        </div>
        <?php
        $dataProvider = $model->search();
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'shop-list-grid',
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
                    'header' => Yii::t('language', 'ชื่อร้านค้า'),
                    'name' => LanguageHelper::changeDB('name_th', 'name_en'),
                    'value' => 'CHtml::link(LanguageHelper::changeDB($data->name_th, $data->name_en), CHtml::normalizeUrl(array("/webSimulation/manageShop/redirectManageShop", "shop_id" => $data->web_shop_id))) ',
                    'type' => 'raw',
                ),
                array(
                    'header' => Yii::t('language', 'ลิ้งก์ URL'),
                    'name' => 'url',
                    'value' => 'CHtml::link("$data->url", $data->url)',
                    'type' => 'raw',
                ),
//                array(
//                    'class' => 'CButtonColumn',
//                    'header' => Yii::t('language', "แก้ไข"),
//                    'template' => '{update}',
//                    'buttons' => array(
//                        'update' => array(
//                            'label' => Yii::t('language', 'แก้ไข'),
//                            'url' => 'CHtml::normalizeUrl(array("/webSimulation/manageShop/register", "shop_id" => $data->web_shop_id))',
//                        ),
//                    ),
//                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "ลบ"),
                    'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบร้านค้านี้หรือไม่?'),
                    'template' => '{delete}',
                    'buttons' => array(
                        'delete' => array(
                            'label' => Yii::t('language', 'ลบ'),
                            'url' => 'CHtml::normalizeUrl(array("/webSimulation/manageShop/deleteShop", "shop_id"=> $data->web_shop_id))',
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
