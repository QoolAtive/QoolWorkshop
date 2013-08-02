<?php
$this->renderPartial('_side_bar', array(
    'id' => $id,
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        $criteria = new CDbCriteria;
        $criteria->order = 'id asc';
        $partner_group = new CActiveDataProvider('SpTypeBusiness', array(
            'criteria' => $criteria,
        ));

        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $partner_group,
            'itemView' => '_list_partner_group',
            'summaryText' => false,
        ));
        ?>
    </div>