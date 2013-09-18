<?php
$this->renderPartial('_menu', array('select' => $view));
?>
<div class="content">
    <div class="tabcontents">

        <img src="<?php echo Yii::t('language', '/img/banner/about.png'); ?>" class="pagebanner" alt="pagebanner"/>

        <?php
        if ($view == '2') {
            $this->renderPartial('_view2');
        } else {
            $this->renderPartial('_view1', array('model' => $model)); // เริ่มต้นที่หน้านี้
        }
        ?>
    </div>
</div>
<!-- end <div class="content">-->