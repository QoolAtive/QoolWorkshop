<!--<div class="content">-->
    <!--<div class="tabcontents">-->
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <?php echo Yii::t('language', 'รายการร้านค้าทั้งหมด'); ?>
            </span>
        </h3>
        <div class="txt-cen">
            <hr>
            <?php
            $count = WebShopCountUser::model()->findAll();
            echo Yii::t('language', 'มีผู้ยอมรับข้อตกลงทั้งหมด') . ' ' . $count[0]['count_number'] . ' ' . Yii::t('language', 'ครั้ง');
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
                    'header' => Yii::t('language', 'ชื่อเจ้าของร้านค้า'),
                    'name' => 'mem_user_id',
                    'value' => 'MemPerson::model()->findByAttributes(array("user_id" => $data->mem_user_id))->ftname . " " . MemPerson::model()->findByAttributes(array("user_id" => $data->mem_user_id))->ltname',
                ),
                array(
                    'header' => Yii::t('language', 'ชื่อร้านค้า'),
                    'name' => LanguageHelper::changeDB('name_th', 'name_en'),
//                    'value' => 'CHtml::link(LanguageHelper::changeDB($data->name_th, $data->name_en), CHtml::normalizeUrl(array("/webSimulation/manageShop/redirectManageShop", "shop_id" => $data->web_shop_id))) ',
//                    'type' => 'raw',
                ),
                array(
                    'header' => Yii::t('language', 'ที่อยู่ลิงก์'),
                    'name' => 'url',
                    'value' => 'CHtml::link("$data->url", $data->url, array(target=>_blank))',
                    'type' => 'raw',
                    'filter' => FALSE,
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
    <!--</div>-->
<!--</div>-->
