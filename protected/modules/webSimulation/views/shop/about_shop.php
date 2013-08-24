<?php
$shop = WebShop::model()->findByPk($id);
?>

<div class="main_box clearfix">
    <h2><?php echo Yii::t('language', 'เกี่ยวกับร้านค้า'); ?></h2>
    <?php echo $shop['description_th']; ?>
</div>
