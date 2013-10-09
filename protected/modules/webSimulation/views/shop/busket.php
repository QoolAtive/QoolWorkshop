<style>
    table td {
        text-align: center;
    }
</style>
<div class="main_box clearfix">
    <h2 class="topic"><?php echo Yii::t('language', 'ตะกร้าสินค้า'); ?></h2>
    <?php
    if ($busket != NULL) {
        ?>
        <table style="width:100%;">
            <tr>
                <th>ชื่อสินค้า</th>
                <th>จำนวน (ชิ้น)</th>
                <th>ราคาชิ้นละ (บาท)</th>
                <th>ภาษีมูลค่าเพิ่ม (บาท)</th>
                <th>ราคารวม (บาท)</th>
            </tr>
            <?php
            $item_id_list = array_keys($busket);
            $price_total = 0;
            foreach ($item_id_list as $item_id) {
                $number = $busket[$item_id];
                if ($number != NULL) {
                    echo '<tr>'; ////tr
                    $item = WebShopItem::model()->findByPk($item_id);
                    if ($item['price_special'] != NULL) {
                        $price = $item['price_special'];
                    } else {
                        $price = $item['price_normal'];
                    }
                    echo '<td>';
                    echo '<a href="' . CHtml::normalizeUrl(array(
                        "/webSimulation/shop/productDetail",
                        'id' => $id,
                        'p_id' => $item_id
                    )) . '">';
                    echo $item['name_th']; //ชื่อสินค้า
                    echo '</a>';
                    echo '</td>';
                    echo '<td>';
                    echo $number; //จำนวน
                    echo '</td>';
                    echo '<td>';
                    echo $price; //ราคาชิ้นละ
                    echo '</td>';
                    echo '<td>';
                    if($item['vat'] != NULL){
                        echo $item['vat']; //ภาษีมูลค่าเพิ่ม
                    } else {
                        echo '-';
                    }
                    echo '</td>';
                    echo '<td>';
                    echo ($price + $item['vat']) * $number; //ราคารวม
                    $price_total += ($price + $item['vat']) * $number;
                    echo '</td>';
                    echo '</tr>'; ///tr
                }//end if ($number != NULL) {
            }// end foreach
            ?>
            <tr><td colspan="5"><hr></hr></tr></td>
            <tr><td colspan="3"></td>
                <td>ค่าขนส่งสินค้า</td>
                <td>
                    <?php
                    $shop = WebShop::model()->findByPk($id);
                    if($shop['tran_cost'] != NULL){
                        echo $shop['tran_cost'];
                        $price_total += $shop['tran_cost'];
                    } else {
                        echo '-';
                    }
                    ?>
                </td></tr>
            <tr>
            <td colspan="3"></td>
            <td>
                <span style="font-weight:bold;">ราคารวมทั้งหมด</span>
            </td>
            <td>
                <span style="font-weight:bold;"><?php echo $price_total; ?></span>
            </td>
            </tr>
        </table>
        <div style="text-align: center; margin-top: 10px;">
            <?php
            echo CHtml::button('   สั่งชื้อ   ', array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array(
                    "/webSimulation/shop/order",
                    'id' => $id,
                    'price_all' => $price_total
                )) . '"'
            ));

            echo CHtml::button('  เอาสินค้าทั้งหมดออก  ', array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array(
                    "/webSimulation/shop/removeAllItem",
                    'id' => $id,
                )) . '"'
            ));
            ?>
        </div>
        <?php
    } else {//end if($busket != NULL){
        echo '<div style="text-align: center;">';
        echo 'ไม่พบสินค้าในตะกร้า';
        echo '</div>';
    }
    ?>
</div>
