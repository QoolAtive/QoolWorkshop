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
        <link rel="stylesheet" type="text/css" media="screen" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <!--<link rel="stylesheet" type="text/css" media="screen" href="/css/mini_calendar.css" />-->
        <!-- <link rel="stylesheet" type="text/css" media="screen" href="$ตัวแปร path url ของ themes"> -->
        <link rel="stylesheet" type="text/css" media="screen" href="/themes/web_sim/<?php echo $this->format['theme']; ?>/css/style.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <!--<script src="/js/fullcalendar.js"></script>-->
        <script src="/js/self/web_sim/mini_calendar.js"></script>

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
            if ($this->format['topic_size'] <= 30) {
                $margin_bt = 0;
            } else {
                $margin_bt = $this->format['topic_size'] / 2;
            }
            echo '.topic, .main_box h2, .right_item_list h2, #col_right_cate h2, #col_right_history h2, #col_right_track h2 {
                        font-size: ' . $this->format['topic_size'] . 'px;
                        font-weight: normal;
                        margin-bottom: ' . $margin_bt . 'px;
                    }';
            echo '</style>';
        }
        if ($this->format['topic_color'] != '' && $this->format['topic_color'] != NULL) {
            echo '<style>';
            echo '.topic, .main_box h2, .right_item_list h2, #col_right_cate h2, #col_right_history h2, #col_right_track h2 {
                        color: ' . $this->format['topic_color'] . ';
                    }';
            echo '</style>';
        }

        //set ขนาดอักษรลิ้งก์
        if ($this->format['link_size'] != '' && $this->format['link_size'] != NULL) {
            echo '<style>';
            echo '#nav li a {
                        font-size: ' . $this->format['link_size'] . 'px;
                    }';
            echo '</style>';
        }
        if ($this->format['link_color'] != '' && $this->format['link_color'] != NULL) {
            echo '<style>';
            echo '#nav li a {
                        color: ' . $this->format['link_color'] . ' !important;
                        padding: 5px 55px;
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
                    <?php $this->widget('application.extensions.search_websim.GoogleSearch'); ?>
                    <!--                                                    <form name="quicksearch" id="quicksearch" action="/webSimulation/shop/search" method="get">
                                                                            <input name="keyword" id="txtSearch" type="text" />
                                                                            <input id="btnTopsearch" onclick="javascript:document.quicksearch.submit();" type="button" />
                                                                        </form>-->
                </div>
            </div>

            <!--Navigator-->
            <?php
            $shop_id = $this->shop['web_shop_id'];
            ?>
            <ul id="nav">
                <!--<span id="link">-->
                <li><a href="/webSimulation/shop/index/id/<?php echo $shop_id; ?>">หน้าหลัก</a></li>
                <li><a href="/webSimulation/shop/productShop/id/<?php echo $shop_id; ?>">สินค้าในร้าน</a></li>
                <!--<li><a class="link" href="/webSimulation/shop/busket/id/<?php echo $shop_id; ?>">ตะกร้าสินค้า</a></li>-->
                <li><a href="/webSimulation/shop/payShop/id/<?php echo $shop_id; ?>">วิธีสั่งซื้อและชำระเงิน</a></li>
                <li><a  href="/webSimulation/shop/aboutShop/id/<?php echo $shop_id; ?>">เกี่ยวกับร้านค้า</a></li>
                <!--</span>-->
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
                            <p >
                                <a href="/webSimulation/shop/productDetail/id/<?php echo $item['web_shop_id']; ?>/p_id/<?php echo $item['web_shop_item_id']; ?>" alt="<?php echo $item['name_th']; ?>">
                                    <span class="normal"><?php echo $item->name_th; ?></span>
                                </a>
                            </p>
                        </div>
                    </div>

                    <!--busket-->
                    <div class="right_item_list">
                        <a href="/webSimulation/shop/busket/id/<?php echo $shop_id; ?>">
                            <h2 class="topic">ตะกร้าสินค้า</h2>
                        </a>
                        <div id="busket_side">
                            <?php
                            $this->renderPartial('//layouts/busket_side_', array('busket' => $this->busket, 'shop_id' => $shop_id));
                            ?>
                        </div>
                    </div>

                    <!--                    
                                            กดซ่อนแล้วแปลี่ยนเป็น - - - > style="display:none;"
                                            หรือจะเช็คให้ Query มาแสดงก็ได้ 
                    -->            
                    <?php
                    $side_box = WebShopSideBox::model()->findByAttributes(array('web_shop_id' => $shop_id));
                    if ($side_box['calendar']) {
                        ?>
                        <div class="right_item_list">
                            <h2 class="topic">ปฏิทิน</h2>
                            <div id='calendar'></div>
                        </div>
                    <?php } ?>

                    <?php
                    if ($side_box['forecast']) {
                        ?>
                        <div class="right_item_list" style="display:block;">
                            <h2 class="topic">พยากรณ์อากาศ</h2>
                            <p align="center">
                                <iframe src="http://www.tmd.go.th/daily_forecast_forweb.php" width="100%" height="260" scrolling="no" frameborder=0></iframe>
                            </p>
                        </div>
                    <?php } ?>

                    <?php
                    if ($side_box['exchange']) {
                        ?>
                        <div class="right_item_list">
                            <h2 class="topic">อัตราดอกเบี้ยและอัตราแลกเปลี่ยน</h2>
                            <p align="center">
                                <iframe id="ifrmBanner" scrolling="no" src="http://www.bangkokbank.com/MajorRates/MainBannerThai.htm" height="155" width="170" frameborder="0"></iframe>
                            </p>
                        </div>
                    <?php } ?>

                    <?php
                    if ($side_box['lottery']) {
                        ?>
                        <div class="right_item_list">
                            <h2 class="topic">ผลสลากกินแบ่ง</h2>
                            <p align="center">
                                <iframe src ="http://www.numwan.com/lottery/lottery.htm" marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=No width=150 height=190></iframe>  
                            </p>
                        </div>
                    <?php } ?>

                    <?php
                    if ($side_box['oil']) {
                        ?>
                        <div class="right_item_list">
                            <h2 class="topic">ราคาน้ำมัน</h2>
                            <p align="center">
                                <iframe frameborder=0 width="195" height="360" scrolling="no" src=http://www.pttplc.com/th/getoilprice.aspx></iframe>   
                            </p>
                        </div>
                    <?php } ?>

                    <?php
                    if ($side_box['gold']) {
                        ?>
                        <div class="right_item_list">
                            <h2 class="topic">ราคาทองคำ</h2>
                            <p align="center">
                                <iframe src="http://namchiang.com/ncgp2-1.swf" width="172" height="165" frameborder="0" marginheight=0 marginwidth=0 scrolling="no"></iframe>
                            </p>
                        </div>
                    <?php } ?>

                    <?php
                    if ($side_box['stock']) {
                        ?>
                        <div class="right_item_list">
                            <h2 class="topic">ดัชนีหุ้น</h2>
                            <p align="center">
                                <iframe src="http://www.settrade.com/banner/banner3.jsp" marginwidth="0" marginleft="0" height="210" width="200" scrolling=no frameborder=no></iframe>  
                            </p>
                        </div>

                    </div>
                <?php } ?>

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