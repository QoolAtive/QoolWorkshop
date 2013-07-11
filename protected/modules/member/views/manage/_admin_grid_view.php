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
            'name' => 'member_name',
            'type' => 'raw',
            'value' => '$data->member_name',
        ),
        array(
            'name' => 'member_lname',
            'type' => 'raw',
            'value' => '$data->member_lname',
        ),
        array(
            'name' => 'username',
            'type' => 'raw',
            'value' => 'Tool::Decrypted($data->username)',
            'filter' => '',
        ),
        array(
            'name' => 'password',
            'value' => 'Tool::Decrypted($data->password)',
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
                    'url' => 'Yii::app()->createUrl("/member/manage/viewAllowMember/",array("id"=>$data->id))',
                ),
            ),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => "ยกเลิก/เพิ่ม <p>(ผู้ใช้)</p>",
            'template' => '{revoke}{add}',
            'headerHtmlOptions' => array('style' => 'width: 10%;'),
            'buttons' => array(
                'revoke' => array(
                    'label' => 'revoke',
                    'url' => 'CHtml::normalizeUrl(array("/member/manage/revokeMember/id/".$data->id))',
                    'imageUrl' => '/images/del_user.png',
                    'visible' => '$data->status == 1?false:true',
                    'click' => 'function(){
                                        if (confirm("คุณต้องการยกเลิกผู้ใช้ออกจากระบบหรือไม่?")){
                                            return true;
                                        }else{
                                            return false;
                                        }
                                    }
                                ',
                ),
                'add' => array(
                    'visible' => '$data->status == 0?false:true',
                    'label' => 'add',
                    'url' => 'CHtml::normalizeUrl(array("/member/manage/revokeMember/id/".$data->id))',
                    'imageUrl' => '/images/add_user.png',
                    'click' => 'function(){
                                        if (confirm("คุณต้องการเพิ่มผู้ใช้เข้าสู่ระบบหรือไม่?")){
                                            return true;
                                        }else{
                                            return false;
                                        }
                                    }
                                ',
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
