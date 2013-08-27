<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="title" content="ร้าน <?php echo $this->shop['name_th']; ?>" />
        <meta name="description" content="" />
        <meta name="language" content="th" />
        <meta name="robots" content="index, follow" />
        <title>ร้าน <?php echo $this->shop['name_th']; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="/themes/web_sim/css/global.css" />
        <!-- <link rel="stylesheet" type="text/css" media="screen" href="$ตัวแปร path url ของ themes"> -->
        <link rel="stylesheet" type="text/css" media="screen" href="/themes/web_sim/<?php echo $this->format['theme']; ?>/css/style.css" />
        <?php
        //set bg
        if ($this->format['background'] != '' && $this->format['background'] != NULL) {
            echo '<style>';
            echo 'body {
                    background: url("' . $this->format['background'] . '") repeat scroll center -100px #FFFFFF;
                }';
            echo '</style>';
        }

        //set ขนาดอักษรทั่วไป
        if ($this->format['char_size'] != '' && $this->format['char_size'] != NULL) {
            echo '<style>';
            echo '.normal {
                        font-size: ' . $this->format['char_size'] . 'px;
                    }';
            echo '</style>';
        }
        if ($this->format['char_color'] != '' && $this->format['char_color'] != NULL) {
            echo '<style>';
            echo '.normal {
                        color: ' . $this->format['char_color'] . ';
                    }';
            echo '</style>';
        }
        
        //set ขนาดอักษรหัวข้อ
        if ($this->format['topic_size'] != '' && $this->format['topic_size'] != NULL) {
            echo '<style>';
            echo '.topic {
                        font-size: ' . $this->format['topic_size'] . 'px;
                        font-weight: normal;
                    }';
            echo '</style>';
        }
        if ($this->format['topic_color'] != '' && $this->format['topic_color'] != NULL) {
            echo '<style>';
            echo '.topic {
                        color: ' . $this->format['topic_color'] . ';
                    }';
            echo '</style>';
        }
        
        //set ขนาดอักษรลิ้งก์
        if ($this->format['link_size'] != '' && $this->format['link_size'] != NULL) {
            echo '<style>';
            echo '.link {
                        font-size: ' . $this->format['link_size'] . 'px;
                    }';
            echo '</style>';
        }
        if ($this->format['link_color'] != '' && $this->format['link_color'] != NULL) {
            echo '<style>';
            echo '.link {
                        color: ' . $this->format['link_color'] . ';
                    }';
            echo '</style>';
        }
        ?>
    </head>
    <body>
        <div id="wrapper">
            <!--Header-->
            <div id="header">
                <h1 id="logo">
                    <a href="/webSimulation/shop/index/id/<?php echo $this->shop['web_shop_id']; ?>">
                        <!-- LOGO QUERY FORM DATABASE -->
                        <img src="<?php echo $this->format['logo']; ?>" alt="<?php echo $this->shop['name_th']; ?>" />
                    </a>
                </h1>
                <!-- quicksearch -->
                <div id="first_search">
                    <form name="quicksearch" id="quicksearch" action="/webSimulation/shop/search" method="get">
                        <input name="keyword" id="txtSearch" type="text" />
                        <input id="btnTopsearch" onclick="javascript:document.quicksearch.submit();" type="button" />
                    </form>
                </div>
            </div>

            <!--Navigator-->
            <?php
            $shop_id = $this->shop['web_shop_id'];
            ?>
            <ul id="nav">
                <li><a class="link" href="/webSimulation/shop/index/id/<?php echo $shop_id; ?>">หน้าหลัก</a></li>
                <li><a class="link" href="/webSimulation/shop/productShop/id/<?php echo $shop_id; ?>">สินค้าในร้าน</a></li>
                <li><a class="link" href="/webSimulation/shop/payShop/id/<?php echo $shop_id; ?>">วิธีสั่งซื้อและชำระเงิน</a></li>
                <li><a class="link" href="/webSimulation/shop/aboutShop/id/<?php echo $shop_id; ?>">เกี่ยวกับร้านค้า</a></li>
            </ul>

            <!--Content	-->
            <div id="content" class="clearfix">
                <!--Column Main-->
                <div id="col_main" class="clearfix">
                    <!-- Shop Box -->
                    <?php echo $content; ?>
                </div><!-- end Column main -->

                <!--Coloumn Right-->
                <div id="col_right" class="clearfix">
                    <!--categories-->
                    <?php
                    $this->renderPartial('//layouts/category_', array('shop_id' => $shop_id));
                    ?>

                    <!--History-->
                    <div id="col_right_history" class="clearfix">
                        <h2 class="topic"><?php echo Yii::t('language', 'สินค้าใหม่ล่าสุด'); ?></h2>
                        <div class="right_item clearfix">
                            <?php
                            $item = WebShopItem::model()->find(array('condition' => 'web_shop_id = ' . $shop_id, 'order' => 'web_shop_item_id desc'));
                            ?>
                            <a href="/webSimulation/shop/productDetail/id/<?php echo $item['web_shop_id']; ?>/p_id/<?php echo $item['web_shop_item_id']; ?>" alt="<?php echo $item['name_th']; ?>">
                                <img src="
                                <?php
                                if ($item['pic_1'] != NULL) {
                                    echo $item['pic_1'];
                                } else if ($item['pic_2'] != NULL) {
                                    echo $item['pic_2'];
                                } else if ($item['pic_3'] != NULL) {
                                    echo $item['pic_3'];
                                } else if ($item['pic_4'] != NULL) {
                                    echo $item['pic_4'];
                                } else if ($item['pic_5'] != NULL) {
                                    echo $item['pic_5'];
                                } else if ($item['pic_6'] != NULL) {
                                    echo $item['pic_6'];
                                } else if ($item['pic_7'] != NULL) {
                                    echo $item['pic_7'];
                                } else if ($item['pic_8'] != NULL) {
                                    echo $item['pic_8'];
                                } else {
                                    echo '/img/noimage.gif';
                                }
                                ?>" alt="" />
                            </a>
                            <p>
                                <a href="/webSimulation/shop/productDetail/id/<?php echo $item['web_shop_id']; ?>/p_id/<?php echo $item['web_shop_item_id']; ?>" alt="<?php echo $item['name_th']; ?>">
                                    <span class="normal"><?php echo $item->name_th; ?></span>
                                </a>
                            </p>
                        </div>
                    </div>

                    <!--Track & Trace-->
                    <!--                    <div id="col_right_track" class="clearfix" >
                                            <h2>Track &amp; Trace</h2>
                                            <div>
                                                <form action="http://track.thailandpost.co.th/trackinternet/Default.aspx" method="post" name="tracking_form" id="tracking_form">
                                                    <label>หมายเลขพัสดุไปรษณีย์</label>
                                                    <input type="text" name="TextBarcode" id="TextBarcode" />
                                                    <input type="hidden" value="Login" id="__EVENTTARGET" name="__EVENTTARGET" />
                                                    <input type="submit" value="ตรวจสอบ" />
                                                </form>
                                            </div>
                                        </div>-->
                    <!-- end Track & Trace-->

                    <div>
                        <!--share fb-->
                        <a href="#" onclick="
                                window.open(
                                        'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(location.href),
                                        'facebook-share-dialog',
                                        'width=626,height=436');
                                return false;">
                            <img src="/img/fbshare.jpg" alt="Share on Facebook" />
                        </a>
                        <!--share fb-->
                    </div>
                    <div>
                        <!--like button-->
                        <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $this->shop['url']; ?>&amp;width=450&amp;height=80&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;send=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
                        <!--like button-->
                    </div>
                </div><!-- end col_right -->
            </div><!-- end content -->
        </div><!-- wrapper -->
    </body>
</html>
