<?php

$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'admin-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'summaryText' => '',
    'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
    'columns' => array(
        array(
            'header' => Yii::t('language', 'ลำดับ'),
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
            'value' => '$data->username',
            'filter' => '',
        ),
        array(
            'name' => 'password',
            'value' => 'Tool::Decrypted($data->password)',
            'filter' => '',
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'header' => Yii::t('language', 'รายละเอียด'),
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('language', 'ดู'),
                    'url' => 'Yii::app()->createUrl("/member/manage/viewAllowMember/",array("id"=>$data->id))',
                ),
            ),
        ),
        array(
            'header' => Yii::t('language', 'ยกเลิก/เพิ่ม(ผู้ใช้)'),
            'type' => 'raw',
            'htmlOptions' => array('style' => 'text-align:center; h'),
            'value' => '
                    ChangeUser2(
                    "status",
                    $data->status,
                    array("0"=> Yii::t("language", "อยู่ในระบบ"), "1" => Yii::t("language","ยกเลิก")),
                    $data->id
                    );
                ',
//            'value' => '',
        ),
//        array(
//            'class' => 'CButtonColumn',
//            'header' => Yii::t('language', "ยกเลิก") . '/' . Yii::t('language', "เพิ่ม") . ' <p>(' . Yii::t('language', "ผู้ใช้") . ')</p>',
//            'template' => '{revoke}{add}',
//            'headerHtmlOptions' => array('style' => 'width: 10%;'),
//            'buttons' => array(
//                'revoke' => array(
//                    'label' => Yii::t('language', 'ยกเลิก'),
//                    'url' => 'CHtml::normalizeUrl(array("/member/manage/revokeMember/id/".$data->id))',
//                    'imageUrl' => '/images/del_user.png',
//                    'visible' => '$data->status == 1?false:true',
//                    'onClick' => 'Confirm();',
//                ),
//                'add' => array(
//                    'visible' => '$data->status == 0?false:true',
//                    'label' => Yii::t('language', 'เพิ่ม'),
//                    'url' => 'CHtml::normalizeUrl(array("/member/manage/revokeMember/id/".$data->id))',
//                    'imageUrl' => '/images/add_user.png',
//                    'onClick' => 'confirm("test")',
//                ),
//            ),
//        ),
    ),
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

function ChangeUser2($id, $value, $list, $user_id) {
    return CHtml::dropDownList(
                    $id, $value, $list, array("onchange" => CHtml::ajax(
                        array(
                            "type" => "POST",
                            "url" => "/member/manage/revokeMember/id/" . $user_id,
                            "data" => array("user_id" => $user_id, "value" => "js:this.value")
                        )
                )
                    )
    );
}

?>
