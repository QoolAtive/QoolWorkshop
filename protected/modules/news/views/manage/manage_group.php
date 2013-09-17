<?php
$this->renderPartial('_side_menu', array('manage' => '1'));
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-bell-alt"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/default/index/view/1")); ?>">
                    <?php echo Yii::t('language', 'ข่าว'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/manage/index")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ข่าว'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กลุ่มข่าว'); ?>
            </span>
        </h3>
        <div class="txt-cen">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'กลุ่มข่าว'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/editGroup")) . '"'));
            ?>
            <hr>
        </div>
        <?php
        $dataProvider = $model->search();
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'news-grid',
            'dataProvider' => $dataProvider,
            'filter' => $model,
            'summaryText' => '',
            'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
            'columns' => array(
                array(
                    'header' => Yii::t('language', 'ลำดับ'),
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
                ),
                array(
                    'header' => Yii::t('language', 'ชื่อ'),
                    'name' => LanguageHelper::changeDB('name_th', 'name_en'),
                    'value' => 'LanguageHelper::changeDB($data->name_th,$data->name_en)'
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "เครื่องมือ"),
                    'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
                    'template' => '{update} &nbsp; {delete}',
                    'buttons' => array(
                        'update' => array(
                            'label' => Yii::t('language', 'แก้ไข'),
                            'url' => 'CHtml::normalizeUrl(array("/news/manage/editGroup", "id"=> $data->id))',
                        ),
                        'delete' => array(
                            'label' => Yii::t('language', 'ลบ'),
                            'url' => 'CHtml::normalizeUrl(array("/news/manage/deleteGroup","id"=> $data->id))',
                        ),
                    ),
                ),
            ), //end 'columns' => array(
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
        <div class="txt-cen">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'กลับไปหน้าที่แล้ว'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/index")) . '"'));
            ?>
            <hr>                
        </div>  
    </div>
</div>
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