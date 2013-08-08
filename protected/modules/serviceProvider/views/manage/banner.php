<label><?php echo Yii::t('language', 'แบนเนอร์ทั้งหมด'); ?></label>
<?php
foreach ($banner as $data) {
    echo CHtml::image("/file/banner/" . $data['path'], "image", array('width' => '350'));
    echo CHtml::ajaxLink(Yii::t('language', 'ลบ'), array(
        '/serviceProvider/manage/delBanner'
            ), array(
        'type' => 'post',
        'data' => array('banner_id' => $data['id'], 'company_id' => $company_id),
            ), array(
        'onClick' => 'return confirm("คุณต้องการลบรูปภาพหรือไม่?")',
        'hrel' => '/serviceProvider/manage/delBanner', 'id' => $data['id']
            )
    );
}
?>