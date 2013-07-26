<div id="content_front" class=" clearfix">
    <h3 class="barH3">
        <span>
            <i class="icon-link"></i><?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ลิงก์หน่วยงาน'); ?>
            <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'ลิงก์'); ?>
        </span>
    </h3>
    <div class="bucketLeft clearfix">
        <div class="areaWhite clearfix">
            <div class="txt-cen clearfix">
                <hr>
                <?php
                echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ลิงก์'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/linkForm")) . '"'));
                echo '  ';
                echo CHtml::button(Yii::t('language', 'เพิ่ม') . '/' . Yii::t('language', 'แก้ไข') . Yii::t('language', 'กลุ่มลิงก์'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/manageGroupLink")) . '"'));
                ?>
                <hr>
            </div>
            <div class="grid_view" >
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'link-grid',
                    'dataProvider' => $dataProvider,
                    'filter' => $model,
                    'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
                    'columns' => array(
                        array(
                            'header' => Yii::t('language', 'ลำดับ'),
                            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
                        ),
                        array(
                            'name' => 'img_path',
                            'type' => 'raw',
                            'value' => 'CHtml::image($data->img_path,\'\',array(
                                \'height\' => \'50\'
                                ))',
                            'filter' => false,
                        ),
                        array(
                            'name' => LanguageHelper::changeDB('name_th', 'name_en'),
                            'value' => 'LanguageHelper::changeDB($data->name_th,$data->name_en)',
                        ),
                        array(
                            'name' => 'link',
                            'value' => '$data->link',
                        ),
                        array(
                            'name' => 'group_id',
//                            'value' => ('LinkGroup::model()->findByPk($data->group_id)->name_th'),
                            'value' => 'LanguageHelper::changeDB(LinkGroup::model()->findByPk($data->group_id)->name_th,LinkGroup::model()->findByPk($data->group_id)->name_en)',
//                            'value' => ('LinkGroup::model()->findByPk($data->group_id)->name_th'),
                            'filter' => CHtml::listData(LinkGroup::model()->findAll(), "id", LanguageHelper::changeDB('name_th', 'name_en')),
                        ),
                        array(
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
            <div class="txt-cen">
                <hr>
                <?php
                echo CHtml::button(Yii::t('language', 'กลับไปหน้าที่แล้ว'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/link/default/index")) . '"'));
                ?> 
                <hr>
            </div>
        </div>
    </div>
</div>
