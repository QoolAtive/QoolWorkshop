<style>
    table td {
        text-align: center;
    }
</style>
<?php
if ($busket != NULL) {
    ?>
    <table style="width:100%;">
        <tr>
            <th>ชื่อสินค้า</th>
            <th>จำนวน(ชิ้น)</th>
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
                $price_total += $price * $number;
                echo '<td>';
                echo $item['name_th']; //ชื่อสินค้า
                echo '</td>';
                echo '<td>';
                echo $number; //จำนวน
                echo '</td>';
                echo '</tr>'; ///tr
            }//end if ($number != NULL) {
        }// end foreach
        ?>
        <td style="font-weight: bold;">
            ราคารวมทั้งหมด
        </td>
        <td style="font-weight: bold;">
            <?php echo $price_total . ' บาท'; ?>
        </td>
    </table>

    <?php
    if ($busket != NULL) {
        echo '<div style="text-align: center; margin-top: 10px;">';
        echo CHtml::button('   สั่งชื้อ   ', array(
            'onclick' => 'window.location = "' . CHtml::normalizeUrl(array(
                "/webSimulation/shop/busket",
                'id' => $shop_id,
            )) . '"'
        ));
        echo '</div>';
    }
    ?>
    <?php
} else {//end if($busket != NULL){
    echo '<span class="normal" style="
        margin: 0 5px;
        padding: 10px;
        ">';
    echo 'ไม่พบสินค้าในตะกร้า';
    echo '</span>';
}
?>
