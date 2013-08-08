<label><?php echo Yii::t('language', 'โบว์ชัวร์'); ?></label>
<?php
foreach ($brochure as $data) {
    echo "<ul>";
    echo "<li>";
    echo CHtml::link($data['path'], array('/serviceProvider/manage/readingFile', 'id' => $data['brochure_id'], 'type' => 'brochure'));
    echo "</li>";
    echo "<li>";
    echo CHtml::ajaxLink(Yii::t('language', 'ลบ'), array(
        '/serviceProvider/manage/delBrochure'
            ), array(
        'type' => 'post',
        'data' => array('brochure_id' => $data['brochure_id'], 'company_id' => $model->id),
        'update' => 'div#brochure',
            ), array(
        'onClick' => 'return confirm("คุณต้องการลบโบว์ชัวร์หรือไม่?")',
        'hrel' => '/serviceProvider/manage/delBrochure', 'id' => $data['brochure_id']
            )
    );
    echo "</li>";
    echo "</ul>";
}
?>