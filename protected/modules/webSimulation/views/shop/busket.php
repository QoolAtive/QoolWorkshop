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
                <th>จำนวน(ชิ้น)</th>
                <th>ราคาชิ้นละ(บาท)</th>
                <th>ราคารวม(บาท)</th>
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
                    echo $price * $number; //ราคารวม
                    $price_total += $price * $number;
                    echo '</td>';
                    echo '</tr>'; ///tr
                }//end if ($number != NULL) {
            }// end foreach
            ?>
            <td colspan="2"></td>
            <td>
                <span style="font-weight:bold;">ราคารวมทั้งหมด</span>
            </td>
            <td>
                <span style="font-weight:bold;"><?php echo $price_total; ?></span>
            </td>
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
                    "/webSimulation/shop/removeAllItem"
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
