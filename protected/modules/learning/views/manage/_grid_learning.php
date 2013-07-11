<?php

$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'admin-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'ajaxUpdate' => true,
    'summaryText' => '',
    'columns' => array(
        array(// display 'create_time' using an expression
            'header' => 'ลำดับ',
            'headerHtmlOptions' => array('style' => 'width: 7%;'),
            'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
        ),
        array(
            'name' => 'group_name',
            'value' => '$data->group_name',
        ),
        array(
            'name' => 'subject',
            'value' => '$data->subject',
        ),
        array(
            'name' => 'date_write',
            'value' => 'Tool::ChangeDateTimeToShow($data->date_write)',
            'filter' => '',
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
            'header' => "รายละเอียด",
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'label' => 'view', //Text label of the button.
//                    'url' => 'Yii::app()->createUrl("/member/manage/viewAllowMember/",array("id"=>$data->id))',
                ),
            ),
        ),
    ),
    'pager' => array(
        'class' => 'CLinkPager',
        'header' => 'หน้าที่: ',
        'firstPageLabel' => 'หน้าแรก',
        'prevPageLabel' => 'ก่อนหน้า',
        'nextPageLabel' => 'หน้าถัดไป',
        'lastPageLabel' => 'หน้าสุดท้าย',
    )
));
?>