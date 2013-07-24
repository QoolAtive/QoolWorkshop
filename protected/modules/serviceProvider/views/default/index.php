<?php
$this->renderPartial('_side_bar', array(
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        $list_data = SpTypeBusiness::model()->findAll();
        foreach ($list_data as $data) {
            ?>
            <div id="view<?php echo $data['id']; ?>" class="tabcontent">
                <div style="border: 1px #c9c9c9 solid;padding: 15px;">

                    <h3><img src="/img/iconform.png"> <?php echo $data['name']; ?> </h3>
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $model->getDataType($data['id']),
                        'itemView' => '_list',
                        'summaryText' => false,
                    ));
                    ?>

                </div>
                <div style="border: 1px #c9c9c9 solid;padding: 15px;margin-top: 5px;">

                    <h3><img src="/img/iconform.png"> Partner</h3>
                    <img src="/img/iconpage/service/chiyo.png" alt="chiyo">
                    <img src="/img/iconpage/service/jaidee.png" alt="jaidee">
                </div>
            </div>
            <?php
        }
        ?>
        

    </div>
</div>