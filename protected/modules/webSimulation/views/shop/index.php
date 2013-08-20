<?php
$boxs = WebShopBox::model()->findAll(array('condition' => 'show_box = \'1\' and web_shop_id = ' . $id, 'order' => 'order_n'));
foreach ($boxs as $box) {
    ?>

    <div class="main_box clearfix col4">
        <h2><a href="#"><?php echo $box['name_th']; ?></a></h2>

        <?php
        if ($box['type'] == '1') {
            $items = WebShopBoxItem::model()->findAll(array('condition' => 'web_shop_box_id = ' . $box['web_shop_box_id']));
            foreach ($items as $item) {
                $item_detail = WebShopItem::model()->findByPk($item['web_shop_item_id']);
                ?>
                <div class="item">
                    <a class="pdf" href="#"></a>
                    <div class="item_pic">
                        <a href="#">
                            <img alt="<?php echo $item_detail['name_th']; ?>" src="
                            <?php
                            if ($item_detail['pic_1'] != NULL) {
                                echo $item_detail['pic_1'];
                            } else if ($item_detail['pic_2'] != NULL) {
                                echo $item_detail['pic_2'];
                            } else if ($item_detail['pic_3'] != NULL) {
                                echo $item_detail['pic_3'];
                            } else if ($item_detail['pic_4'] != NULL) {
                                echo $item_detail['pic_4'];
                            } else if ($item_detail['pic_5'] != NULL) {
                                echo $item_detail['pic_5'];
                            } else if ($item_detail['pic_6'] != NULL) {
                                echo $item_detail['pic_6'];
                            } else if ($item_detail['pic_7'] != NULL) {
                                echo $item_detail['pic_7'];
                            } else if ($item_detail['pic_8'] != NULL) {
                                echo $item_detail['pic_8'];
                            } else {
                                echo '/img/noimage.gif';
                            }
                            ?>" />
                        </a>
                        <span class="price">฿<?php echo $item_detail['price_normal']; ?></span>
                    </div>
                    <div class="info_item">
                        <h3><a href="#" alt="<?php echo $item_detail['name_th']; ?>" title="<?php echo $item_detail['name_th']; ?>">
                                <?php echo $item_detail['name_th']; ?>
                                <span class="promotion_price"></span>
                            </a></h3>
                    </div>
                </div>
                <?php
            } //END item
        } else if ($box['type'] == '2') {
            //กล่องแสดง HTML
            echo $box['code'];
        } else if ($box['type'] == '3') {
            //กล่องแสดง Video
//            $url = $box['code'];
//
//            parse_str(parse_url($url, PHP_URL_QUERY), $qstring);
//
//            echo '<object width="425" height="344">
//                <param name="movie" value="http://www.youtube.com/v/' . $qstring['v'] . '&hl=en&fs=1"></param>
//                <param name="allowFullScreen" value="true"></param>
//                <param name="allowscriptaccess" value="always"></param>
//                <embed src="http://www.youtube.com/v/' . $qstring['v'] . '&hl=en&fs=1"
//                       type="application/x-shockwave-flash"
//                       allowscriptaccess="always"
//                       allowfullscreen="true"
//                       width="425"
//                       height="344"></embed>
//                </object>';
            //==============
            echo $box['code'];
        }
        ?>

    </div>

<?php }
?>

<script>
//    $('body').html(function(i, html) {
//        return html.replace(/(?:http:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?(.+)/g, '<iframe width="420" height="345" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>');
//    });
</script>