<!-- 3.FAQ E-Dir -->
<div id="view3" class="tabcontent">
    <?php
    $dataProvider = $model->search();
    $dataProvider->criteria->addCondition('fm_id = 3');
//            echo CHtml::ajaxButton(Yii::t('language', 'เพิ่ม'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/3')), array('update' => '#edit3', 'success' => 'showDiv3')
//            );
    echo CHtml::button(Yii::t('language', 'เพิ่ม'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/default/editFaq/fm_id/3")) . '"'));
    ?>
    <!--            <div id="edit3">-->
    <?php
//                $this->renderPartial('_editfaq', array(
//                    'model' => $model,
//                ));
    ?>
    <!--            </div>-->
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'faq3-grid',
        'dataProvider' => $dataProvider,
        'filter' => $model,
        'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
        'pagerCssClass' => 'alignCenter',
        'ajaxUpdate' => true,
        'columns' => array(
            array(
                'header' => Yii::t('language', 'ลำดับที่'),
                'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            ),
            array(
                'header' => 'คำถาม',
                'name' => 'subject_th',
                'value' => 'strip($data->subject_th, 10);'
            ),
            array(
                'header' => 'คำตอบ',
                'name' => 'detail_th',
                'value' => 'strip($data->detail_th, 30);'
            ),
            array(
                'class' => 'CButtonColumn',
                'header' => Yii::t('language', "แก้ไข"),
                'template' => '{update}',
                'buttons' => array(
                    'update' => array(
                        'label' => Yii::t('language', 'แก้ไข'),
//                                'click' => "function(){
//                                    $.fn.yiiGridView.update('faq3-grid', {
//                                        type:'POST',
//                                        url:$(this).attr('href'),
//                                        success:function(data) {
//                                              $('#edit3').hide().html(data).fadeIn();
//                                              $.fn.yiiGridView.update('faq3-grid');
//                                        }
//                                    })
//                                    return false;
//                              }
//                     ",
                        'url' => 'CHtml::normalizeUrl(array("/faq/default/editFaq","fm_id"=> $data->fm_id ,"id"=> $data->id))',
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
                        'url' => 'CHtml::normalizeUrl(array("/faq/default/deleteFaq","id"=> $data->id))',
                    ), //end 'delete' => array(
                ), //end 'buttons' => array(
            ),
        ), //end 'columns' => array(
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
<!-- END 3.FAQ E-Dir -->