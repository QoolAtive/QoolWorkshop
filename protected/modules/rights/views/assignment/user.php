<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'มอบหมาย') => array('assignment/view'),
    $model->getName(),
);
?>

<div id="userAssignments">

    <h2><?php
        echo Rights::t('core', 'มอบหมายรหัสผู้ใช้ :username', array(
            ':username' => $model->getName()
        ));
        ?></h2>

    <div class="assignments span-12 first">

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $dataProvider,
            'template' => '{items}',
            'hideHeader' => true,
            'emptyText' => Rights::t('core', 'ผู้ใช้รายนี้ยังไม่ได้รับมอบหมายรายการใด'),
            'htmlOptions' => array('class' => 'grid-view user-assignment-table mini'),
            'columns' => array(
                array(
                    'name' => 'name',
                    'header' => Rights::t('core', 'ชื่อ'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'name-column'),
                    'value' => '$data->getNameText()',
                ),
                array(
                    'name' => 'type',
                    'header' => Rights::t('core', 'ประเภท'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'type-column'),
                    'value' => '$data->getTypeText()',
                    $data->getTypeText()
                ),
                array(
                    'header' => '&nbsp;',
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'actions-column'),
                    'value' => '$data->getRevokeAssignmentLink()',
                ),
            )
        ));
        ?>

    </div>

    

</div>
