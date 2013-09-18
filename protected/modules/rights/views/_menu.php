<?php $this->widget('zii.widgets.CMenu', array(
	'firstItemCssClass'=>'first',
	'lastItemCssClass'=>'last',
	'htmlOptions'=>array('class'=>'actions'),
	'items'=>array(
		array(
			'label'=>Rights::t('core', 'มอบหมาย'),// Assignments
			'url'=>array('assignment/view'),
			'itemOptions'=>array('class'=>'item-assignments'),
		),
		array(
			'label'=>Rights::t('core', 'สิทธิ์'),//Permissions
			'url'=>array('authItem/permissions'),
			'itemOptions'=>array('class'=>'item-permissions'),
		),
		array(
			'label'=>Rights::t('core', 'หน้าที่'),//Roles
			'url'=>array('authItem/roles'),
			'itemOptions'=>array('class'=>'item-roles'),
		),
		array(
			'label'=>Rights::t('core', 'งาน'),//Tasks
			'url'=>array('authItem/tasks'),
			'itemOptions'=>array('class'=>'item-tasks'),
		),
		array(
			'label'=>Rights::t('core', 'การดำเนินการ'),//Operations
			'url'=>array('authItem/operations'),
			'itemOptions'=>array('class'=>'item-operations'),
		),

		array(
			'label'=>Rights::t('core', 'ย้อนกลับ'),//
			'url'=>array('/member/manage/profile'),
			'itemOptions'=>array('class'=>'item-operations'),
		),
	)
));	?>