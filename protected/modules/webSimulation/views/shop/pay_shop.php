<?php
$pay = WebShopPay::model()->findByAttributes(array('web_shop_id' => $id));
?>

<div class="main_box clearfix">
    <h2 class="topic"><?php echo Yii::t('language', 'วิธีสั่งซื้อและชำระเงิน'); ?></h2>
    <span class="normal">
        <ul>
        <?php
        $i = 1;
        if($pay['pay_transfer']){
            echo '<li>';
            echo $i . ') โอนเงินผ่านทาง';
            echo '<ul><li>';
            echo '&nbsp&nbsp&nbsp&nbspธนาคาร : '.$pay['account_bank'];
            echo '</li><li>';
            echo '&nbsp&nbsp&nbsp&nbspชื่อบัญชี : '.$pay['account_name'];
            echo '</li><li>';
            echo '&nbsp&nbsp&nbsp&nbspเลขที่บัญชี : '.$pay['account_number'];
            echo '</li></ul>';
            echo '</li>';
            $i++;
        }
        if($pay['pay_ems']){
            echo '<li>';
            echo $i . ') ส่งสินค้าทางพัสดุเก็บเงินปลายทาง';
            echo '</li>';
            $i++;
        }
        if($pay['pay_byself']){
            echo '<li>';
            echo $i . ') รับสินค้าและชำระเงินด้วยตนเอง';
            echo '<ul><li>';
            echo '&nbsp&nbsp&nbsp&nbspสถานที่ : '.$pay['location'];
            echo '</li><li>';
            echo '&nbsp&nbsp&nbsp&nbspเบอร์โทร : '.$pay['tel'];
            echo '</li></ul>';
            echo '</li>';
            $i++;
        }
        if($pay['pay_other']){
            echo '<li>';
            if($i > 1){
                echo $i . ') อื่นๆ';
            }
            echo $pay['other'];
            echo '</li>';
        }
        ?>
        </ul>
    </span>
</div>
