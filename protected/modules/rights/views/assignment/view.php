<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Assignments'),
);
?>
<h3 class="barH3">
            <span>
                <i class="icon-cog"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
                    <?php echo Yii::t('language', 'ตั้งค่าเว็บไซต์'); ?>
                </a>
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', 'Assignments'); ?>
            </span>
</h3>
<div id="assignments">

    <h2><?php echo Rights::t('core', 'Assignments'); ?></h2>

    <p>
    <?php echo Rights::t('core', 'Here you can view which permissions has been assigned to each user.'); ?>
    </p>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $dataProvider,
        'filter' => $model_user,
        'template' => "{items}\n{pager}",
        'emptyText' => Rights::t('core', 'No users found.'),
        'htmlOptions' => array('class' => 'grid-view assignment-table'),
        'columns' => array(
            array(
                'name' => 'username',
                'header' => Rights::t('core', 'Name'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'name-column'),
                'value' => '$data->getAssignmentNameLink()',
            ),
            array(
                'name' => 'assignments',
                'header' => Rights::t('core', 'Roles'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'role-column'),
                'value' => '$data->getAssignmentsText(CAuthItem::TYPE_ROLE)',
                'filter' => false,
            ),
            array(
                'name' => 'assignments',
                'header' => Rights::t('core', 'Tasks'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'task-column'),
                'value' => '$data->getAssignmentsText(CAuthItem::TYPE_TASK)',
                'filter' => false,
            ),
            array(
                'name' => 'assignments',
                'header' => Rights::t('core', 'Operations'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'operation-column'),
                'value' => '$data->getAssignmentsText(CAuthItem::TYPE_OPERATION)',
                'filter' => false,
            ),
        )
    ));
    ?>

</div>