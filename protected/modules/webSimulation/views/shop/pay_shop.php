<?php
$shop = WebShop::model()->findByPk($id);
?>

<div class="main_box clearfix">
    <h2><?php echo Yii::t('language', 'วิธีสั่งซื้อและชำระเงิน'); ?></h2>
    <?php echo $shop['how_to_buy_th']; ?>
</div>
