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
        <label  style="font-size: 16px; font-weight: bold;color: #D69500;"><?php echo $data->name; ?></label>
        <p>
            <?php echo $data->detail; ?>
        </p>
        <hr />
        <label style="font-size: 16px; font-weight: bold;color: #D69500;"><?php echo Yii::t('language', 'เงื่อนไขการชำระเงิน'); ?></label>
        <p>
            <?php
            $payment = null;
            $other = null;
            $paymentCondition = PaymentCondition::model()->findAll('product_id = :product_id', array(':product_id' => $data->id));
            foreach ($paymentCondition as $paymentConditiondata) {
                $typePayment = Payment::model()->findByPk($paymentConditiondata['payment_id']);
                if ($payment == null) {
                    $payment .= $typePayment->name;
                } else {
                    $payment .= ',' . $typePayment->name;
                }
                if ($paymentConditiondata['payment_id'] == 5) {
                    $other = 'รายละเอียดอื่นๆ : ' . $paymentConditiondata['other'];
                }
            }
            echo 'ประเภท : ' . $payment . "<br />";
            echo $other . "<br />";
            ?>
        </p>
        <hr />
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
    </li>
</ul>
