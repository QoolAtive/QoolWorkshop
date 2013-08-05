<?php
$this->renderPartial('_side_menu', array('manage' => '1'));
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-bell-alt"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/default/index/view/1")); ?>">
                    <?php echo Yii::t('language', 'ข่าว') . $type; ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ข่าว'); ?>
            </span>
        </h3>
        <div class="txt-cen">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ข่าว'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/edit")) . '"'));
            echo CHtml::button(Yii::t('language', 'จัดการ') . ' ' . Yii::t('language', 'กลุ่มข่าว'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/manageGroup")) . '"'));
            ?>
            <hr>
        </div>
        <?php
        $dataProvider = $model->search();
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'news-grid',
            'dataProvider' => $dataProvider,
            'filter' => $model,
            'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
            'pagerCssClass' => 'alignCenter',
            'ajaxUpdate' => true,
            'columns' => array(
                array(
                    'header' => Yii::t('language', 'ลำดับ'),
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
                ),
                array(
                    'header' => Yii::t('language', 'หัวข้อ'),
                    'name' => LanguageHelper::changeDB('subject_th', 'subject_en'),
                    'value' => 'strip(LanguageHelper::changeDB($data->subject_th,$data->subject_en), 20);'
                ),
                array(
                    'header' => Yii::t('language', 'รายละเอียด'),
                    'name' => LanguageHelper::changeDB('detail_th', 'detail_en'),
                    'value' => 'strip(LanguageHelper::changeDB($data->detail_th,$data->detail_en), 20);'
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "แก้ไข"),
                    'template' => '{update}',
                    'buttons' => array(
                        'update' => array(
                            'label' => Yii::t('language', 'แก้ไข'),
                            'url' => 'CHtml::normalizeUrl(array("/news/manage/edit", "id"=> $data->id))',
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
                            'url' => 'CHtml::normalizeUrl(array("/news/manage/delete","id"=> $data->id))',
                        ), //end 'delete' => array(
                    ), //end 'buttons' => array(
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
    </div>
</div>
<?php

function strip($data, $len) {
    $data = strip_tags(trim($data));
    if (strlen($data) > $len) {
        $return = txtTruncate($data, $len);
        $return .= "...";
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