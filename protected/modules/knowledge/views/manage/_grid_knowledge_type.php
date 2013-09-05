<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'knowledge_type-grid',
    'dataProvider' => $modelKnowledgeType->getData(),
    'filter' => $modelKnowledgeType,
    'ajaxUpdate' => true,
    'summaryText' => '',
    'columns' => array(
        array(// display 'create_time' using an expression
            'header' => Yii::t('language', 'ลำดับ'),
            'headerHtmlOptions' => array('style' => 'width: 7%;'),
            'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
        ),
        array(
            'name' => 'name_th',
            'value' => '$data->name_th',
        ),
        array(
            'name' => 'name_en',
            'type' => 'raw',
            'value' => '$data->name_en',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', 'เครื่องมือ'),
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบบทความหรือไม่?'),
            'template' => '{update}{delete}',
            'buttons' => array(
                'update' => array(
                    'label' => 'edit', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/knowledge/manage/knowledgeTypeInsert/",array("knowledge_type_id"=>$data->knowledge_type_id))',
                ),
                'delete' => array(
                    'label' => 'del', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/knowledge/manage/knowledgeTypeDel/",array("knowledge_type_id"=>$data->knowledge_type_id))',
                ),
            ),
            'afterDelete' => 'function(link,success,data){
                                    if(data != ""){
                                        alert(data);
                                    }
                    }'
        ),
    ),
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
