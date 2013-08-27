<?php
$shop = WebShop::model()->findByPk($id);
?>

<div class="main_box clearfix">
    <h2 class="topic"><?php echo Yii::t('language', 'วิธีสั่งซื้อและชำระเงิน'); ?></h2>
    <span class="normal">
        <?php echo $shop['how_to_buy_th']; ?>
    </span>
</div>
