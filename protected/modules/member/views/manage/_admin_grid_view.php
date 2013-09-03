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
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', "ยกเลิก") . '/' . Yii::t('language', "เพิ่ม") . ' <p>(' . Yii::t('language', "ผู้ใช้") . ')</p>',
            'template' => '{revoke}{add}',
            'headerHtmlOptions' => array('style' => 'width: 10%;'),
            'buttons' => array(
                'revoke' => array(
                    'label' => Yii::t('language', 'ยกเลิก'),
                    'url' => 'CHtml::normalizeUrl(array("/member/manage/revokeMember/id/".$data->id))',
                    'imageUrl' => '/images/del_user.png',
                    'visible' => '$data->status == 1?false:true',
                    'click' => 'function(){
                                        if (confirm(' . Yii::t('language', "คุณต้องการยกเลิกผู้ใช้ออกจากระบบหรือไม่?") . ')){
                                            return true;
                                        }else{
                                            return false;
                                        }
                                    }
                                ',
                ),
                'add' => array(
                    'visible' => '$data->status == 0?false:true',
                    'label' => Yii::t('language', 'เพิ่ม'),
                    'url' => 'CHtml::normalizeUrl(array("/member/manage/revokeMember/id/".$data->id))',
                    'imageUrl' => '/images/add_user.png',
                    'click' => 'function(){
                                        if (confirm(' . Yii::t('language', "คุณต้องการเพิ่มผู้ใช้เข้าสู่ระบบหรือไม่?") . ')){
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
