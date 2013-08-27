<div id="col_right_cate" class="clearfix">
    <h2 class="topic">หมวดหมู่สินค้า</h2>
    <ul>
        <li>
            <a href="/webSimulation/shop/productShop/id/<?php echo $shop_id; ?>">
                <span class="normal">ดูสินค้าทั้งหมด</span>
            </a>
        </li>
        <?php
        $category_list = WebShopCategory::model()->findAllByAttributes(array('web_shop_id' => $shop_id));
        foreach ($category_list as $category) {
            ?>
            <li>
                <a href="/webSimulation/shop/category/id/<?php echo $shop_id; ?>/category_id/<?php echo $category['web_shop_category_id']; ?>">
                    <span class="normal"><?php echo $category['name_th']; ?></span>
                </a>
            </li>
        <?php }
        ?>
    </ul>
</div>