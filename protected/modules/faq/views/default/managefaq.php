<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/faq.png"/></li>
        </ul>
    </div>

    <ul class="tabs clearfix">
        <li><a rel="view1" href="#">Manage<br/>FAQ Service Provider</a></li>
        <li><a rel="view2" href="#">Manage<br/>FAQ Knowledge & Learning</a></li>
        <li><a rel="view3" href="#">Manage<br/>FAQ E-Directory</a></li>
        <li><a rel="view4" href="#">Manage<br/>FAQ Web Simulation</a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index')); ?>">Back to FAQ</a></li>
    </ul>
</div>

<div class="content">
    <div class="tabcontents" >
        <h3>Manage FAQ</h3>
        <!-- 1. FAQ Service Provider -->
        <div id="view1" class="tabcontent">
            <?php
            $dataProvider = $model->search();
            $dataProvider->criteria->addCondition('fm_id = 1');
//            echo CHtml::button(Yii::t('language', 'เพิ่ม'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/1')), array('update' => '#edit1', 'success' => 'showDiv1')
//            );
            echo CHtml::button(Yii::t('language', 'เพิ่ม'), array(
    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/default/editFaq/fm_id/1")) . '"'));
            ?>
<!--            <div id="edit1">-->
                <?php
//                $this->renderPartial('_editfaq', array(
//                    'model' => $model,
//                ));
                ?>
<!--            </div>-->
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'faq1-grid',
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
                        'value' => 'strip($data->subject_th, 20);'
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
//                                    $.fn.yiiGridView.update('faq1-grid', {
//                                        type:'POST',
//                                        url:$(this).attr('href'),
//                                        success:function(data) {
//                                              $('#edit1').hide().html(data).fadeIn();
//                                              $.fn.yiiGridView.update('faq1-grid');
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
        <!-- END 1. FAQ Service Provider -->

        <!-- 2.FAQ Knowledge & Learning -->
        <div id="view2" class="tabcontent">
            <?php
            $dataProvider = $model->search();
            $dataProvider->criteria->addCondition('fm_id = 2');
//            echo CHtml::ajaxButton(Yii::t('language', 'เพิ่ม'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/2')), array('update' => '#edit2', 'success' => 'showDiv2')
//            );
            echo CHtml::button(Yii::t('language', 'เพิ่ม'), array(
    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/default/editFaq/fm_id/2")) . '"'));
            ?>
<!--            <div id="edit2">-->
                <?php
//                $this->renderPartial('_editfaq', array(
//                    'model' => $model,
//                ));
                ?>
<!--            </div>-->
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'faq2-grid',
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
//                                    $.fn.yiiGridView.update('faq2-grid', {
//                                        type:'POST',
//                                        url:$(this).attr('href'),
//                                        success:function(data) {
//                                              $('#edit2').hide().html(data).fadeIn();
//                                              $.fn.yiiGridView.update('faq2-grid');
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
        <!-- END 2.FAQ Knowledge & Learning -->

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

        <!-- 4.FAQ Web Simulation -->
        <div id="view4" class="tabcontent">
            <?php
            $dataProvider = $model->search();
            $dataProvider->criteria->addCondition('fm_id = 4');
//            echo CHtml::ajaxButton(Yii::t('language', 'เพิ่ม'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/4')), array('update' => '#edit4', 'success' => 'showDiv4')
//            );
            echo CHtml::button(Yii::t('language', 'เพิ่ม'), array(
    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/default/editFaq/fm_id/4")) . '"'));
            ?>
            <div id="edit4">
                <?php
//                $this->renderPartial('_editfaq', array(
//                    'model' => $model,
//                ));
                ?>
<!--            </div>-->
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'faq4-grid',
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
//                                    $.fn.yiiGridView.update('faq4-grid', {
//                                        type:'POST',
//                                        url:$(this).attr('href'),
//                                        success:function(data) {
//                                              $('#edit4').hide().html(data).fadeIn();
//                                              $.fn.yiiGridView.update('faq4-grid');
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
        <!-- END 4.FAQ Web Simulation -->

    </div>
</div>

<script>
    //    function reloadGrid() {
    //        $.fn.yiiGridView.update('link-grid');
    //    }
    //    function hideDiv(data){
    //        $('#edit').hide().html(data).fadeOut();
    //    }
    $(document).ready(function() {
        if (location.hash == "#view1") {
        }
        if (location.hash == "#view2") {
        }
        if (location.hash == "#view3") {
        }
        if (location.hash == "#view4") {
        }
    });
    function showDiv1(data){
        $('#edit1').hide().html(data).fadeIn();
    }
    function showDiv2(data){
        $('#edit2').hide().html(data).fadeIn();
    }
    function showDiv3(data){
        $('#edit3').hide().html(data).fadeIn();
    }
    function showDiv4(data){
        $('#edit4').hide().html(data).fadeIn();
    }

</script>
<?php

function strip($data, $len) {
    $data = strip_tags(trim($data));
    if (strlen($data) > $len) {
        $return = txtTruncate($data, $len);
        $return .= " ...";
    } else {
        $return = $data;
    }
    return $return;
}

function txtTruncate($string, $limit, $break = " ") {
    if (strlen($string) <= $limit)
        return $string;
    if (false !== ($breakpoint = strpos($string, $break, $limit))) {
        if ($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint);
        }
    }
    return $string;
}
?>