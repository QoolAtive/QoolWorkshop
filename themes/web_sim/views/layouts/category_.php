<div id="col_right_cate" class="clearfix">
    <h2>หมวดหมู่สินค้า</h2>
    <ul>
        <li><a href="/webSimulation/shop/productShop/id/<?php echo $shop_id; ?>">ดูสินค้าทั้งหมด</a></li>
        <?php
        $category_list = WebShopCategory::model()->findAllByAttributes(array('web_shop_id' => $shop_id));
        foreach ($category_list as $category) {
            ?>
            <li><a href="#"><?php echo $category['name_th']; ?></a></li>
        <?php }
        ?>
    </ul>
</div>