<?php
$name = LanguageHelper::changeDB($data->name, $data->name_en);
$detail = LanguageHelper::changeDB($data->detail, $data->detail_en);
?>
<ul class="productlist">
    <li>
        <?php
        if ($data->pic == null) {
            ?>
            <img src="/file/product/default.jpg" width="100%">
            <?php
        } else {
            ?>
            <img src="/file/product/<?php echo $data->pic; ?> " width="100%">
            <?php
        }
        ?>
    </li>
    <li>
        <label  style="font-size: 16px; font-weight: bold;color: #D69500;"><?php echo $name; ?></label>
        <p>
            <?php echo $detail; ?>
        </p>
        <label style="font-size: 16px; font-weight: bold;color: #D69500;"><?php echo Yii::t('language', 'เงื่อนไขการชำระเงิน'); ?></label>
        <p>
            <?php
            $payment = null;
            $other = null;
            $paymentCondition = PaymentCondition::model()->findAll('product_id = :product_id', array(':product_id' => $data->id));
            foreach ($paymentCondition as $paymentConditiondata) {
                $typePayment = Payment::model()->findByPk($paymentConditiondata['payment_id']);
                if ($payment == null) {
//                    $payment .= $typePayment->name;
                    $payment .= LanguageHelper::changeDB($typePayment->name, $typePayment->name_en);
                } else {
//                    $payment .= ',' . $typePayment->name;                    
                    $payment .= ',' . LanguageHelper::changeDB($typePayment->name, $typePayment->name_en);
                }
                if ($paymentConditiondata['payment_id'] == 5) {
                    $other = Yii::t('language', 'รายละเอียดอื่นๆ') . ' : ' . $paymentConditiondata['other'];
                }
            }
            echo Yii::t('language', 'ประเภท') . ' : ' . $payment . "<br />";
            echo $other . "<br />";
            ?>
        </p>
        <?php
        $paymentSpecial = PaymentSpecial::model()->findAll('product_id = :product_id', array(':product_id' => $data->id));
//        echo "<pre>";
//        print_r($paymentSpecial);
        if (count($paymentSpecial) > 0) {
            ?>
            <label style="font-size: 16px; font-weight: bold;color: #D69500;"><?php echo Yii::t('language', 'สิทธิพิเศษ'); ?></label>
            <p>
                <?php
                $special = null;
                $specialother = null;
                $paymentSpecial = PaymentSpecial::model()->findAll('product_id = :product_id', array(':product_id' => $data->id));
                foreach ($paymentSpecial as $paymentSpecialdata) {
//                $typePayment = ::model()->findByPk($data['special_id']);
//                if ($special == null) {
                    $special = Payment::model()->getListDataOption($paymentSpecialdata['special_id']);
//                } else {
//                    $special .= ',' . Payment::model()->getListDataOption($paymentSpecialdata['special_id']);
//                }
                    $specialother = $paymentSpecialdata['other'];
                    echo '- ' . $special . ' ' . $specialother . "<br />";
                }
                ?>
            </p>
        <?php } ?>
    </li>
</ul>
