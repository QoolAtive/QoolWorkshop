<div id="content_front" class=" clearfix">
    <h3 class="barH3">
        <span><?php echo Yii::t('language', 'จัดการเว็บไซต์ที่เกี่ยวข้อง'); ?></span>
    </h3>
    <div class="bucketLeft clearfix">
        <div class="areaWhite clearfix">
            <div class="btnMngED clearfix">
                <?php
                echo CHtml::button(Yii::t('language', 'เพิ่มลิ้งก์'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/linkForm")) . '"'));
                echo '  ';
                echo CHtml::button(Yii::t('language', 'เพิ่ม/แก้ไข กลุ่มลิ้งก์'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/manageGroupLink")) . '"'));
                ?>
            </div>
            <div class="grid_view" >
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'link-grid',
                    'dataProvider' => $dataProvider,
                    'filter' => $model,
                    'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
//                    'pagerCssClass' => 'alignCenter',
                    'columns' => array(
                        array(
                            'header' => Yii::t('language', 'ลำดับที่'),
//                            'htmlOptions' => array('class' => 'button-column'),
                            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
                        ),
                        array(
                            'header' => Yii::t('language', 'รูปลิงค์'),
                            'name' => 'img_path',
                            'type' => 'raw',
                            'value' => 'CHtml::image($data->img_path,\'\',array(
                                \'height\' => \'50\'
                                ))',
                            'filter' => false,
                        ),
                        array(
                            'header' => Yii::t('language', 'ชื่อลิงค์'),
                            'name' => 'name_th',
                            'value' => '$data->name_th',
                        ),
                        array(
                            'header' => Yii::t('language', 'ที่อยู่ลิงค์'),
                            'name' => 'link',
                            'value' => '$data->link',
                        ),
                        array(
                            'header' => Yii::t('language', 'กลุ่ม'),
                            'name' => 'group_id',
                            'value' => ('LinkGroup::model()->findByPk($data->group_id)->name_th'),
                            'filter' => CHtml::listData(LinkGroup::model()->findAll(), "id", "name_th"),
                        ),
                        array(
                            'header' => Yii::t('language', 'วันเวลาที่สร้างลิงค์'),
                            'name' => 'date_write',
                            'value' => 'Tool::ChangeDateTimeToShow($data->date_write)',
                            'filter' => false,
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'header' => Yii::t('language', "แก้ไข"),
                            'template' => '{update}',
                            'buttons' => array(
                                'update' => array(
                                    'label' => Yii::t('language', 'แก้ไข'),
                                    'url' => 'CHtml::normalizeUrl(array("/link/default/linkForm","id"=> $data->id))',
                                ),
                            ),
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'header' => Yii::t('language', "ลบ"),
                            'template' => '{delete}',
                            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
                            'buttons' => array(
                                'delete' => array(
                                    'label' => Yii::t('language', 'ลบ'),
//                                    'options' => array('confirm' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?')),
                                    'url' => 'CHtml::normalizeUrl(array("/link/default/deleteLink","id"=> $data->id))',
                                ),
                            ),
                        ),
                    ),
                    'template' => "{pager}\n{items}\n{pager}",
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
            <div class="btnForm l_btn">
                <?php
                echo CHtml::button(Yii::t('language', 'กลับไปหน้าที่แล้ว'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/index")) . '"'));
                ?> 
            </div>
        </div>



    </div>
</div>
