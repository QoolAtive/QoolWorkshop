<h2 class="clearfix">Result "<?php echo $name; ?>", "<?php echo $address; ?>", "<?php echo $type_name; ?>" </h2><hr>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => 'list_search',
    'summaryText' => false,
));
?>