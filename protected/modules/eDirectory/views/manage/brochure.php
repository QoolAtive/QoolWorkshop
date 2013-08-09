<label><?php echo Yii::t('language', 'โบว์ชัวร์'); ?></label>
<?php
foreach ($brochure as $data) {
    echo "<ul>";
    echo "<li>";
    echo CHtml::link($data['path'], array('/eDirectory/default/readingFile', 'id' => $data['company_brochure_id'], 'type' => 'brochure'));
    echo "</li>";
    echo "<li>";
    echo CHtml::ajaxLink(Yii::t('language', 'ลบ'), array(
        '/eDirectory/manage/delBrochure'
            ), array(
        'type' => 'post',
        'data' => array('brochure_id' => $data['company_brochure_id'], 'company_id' => $model->id),
        'update' => 'div#brochure',
            ), array(
//        'onClick' => 'return confirm("คุณต้องการลบโบว์ชัวร์หรือไม่?")',
        'hrel' => '/eDirectory/manage/delBrochure', 'id' => $data['company_brochure_id']
            )
    );
    echo "</li>";
    echo "</ul>";
}
?>