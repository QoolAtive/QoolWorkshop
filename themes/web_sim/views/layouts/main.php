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
    </head>
    <body>
        <div id="wrapper">
            <!--Header-->
            <div id="header">
                <h1 id="logo">
                    <a href="#">
                        <!-- LOGO QUERY FORM DATABASE -->
                        <img src="<?php echo $this->format['logo']; ?>" alt="<?php echo $this->shop['name_th']; ?>" />
                    </a>
                </h1>
                <!-- quicksearch -->
                <div id="first_search">
                    <form name="quicksearch" id="quicksearch" action="/QoolBook/search" method="get">
                        <input name="keyword" id="txtSearch" type="text" />
                        <input id="btnTopsearch" onclick="javascript:document.quicksearch.submit();" type="button" />
                    </form>
                </div>
            </div>

            <!--Navigator-->
            <?php
//        $shop_id = $_GET['id']; 
            $shop_id = $this->shop['web_shop_id'];
//        echo "<pre>";
//        print_r($this->shop);
//        echo "</pre>";
            ?>
            <ul id="nav">
                <li><a href="/webSimulation/shop/index/id/<?php echo $shop_id; ?>">หน้าหลัก</a></li>
                <li><a href="/webSimulation/shop/productShop/id/<?php echo $shop_id; ?>">สินค้าในร้าน</a></li>
                <li><a href="/webSimulation/shop/payShop/id/<?php echo $shop_id; ?>">วิธีสั่งซื้อและชำระเงิน</a></li>
                <li><a href="/webSimulation/shop/aboutShop/id/<?php echo $shop_id; ?>">เกี่ยวกับร้านค้า</a></li>
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
                    <div id="col_right_cate" class="clearfix">
                        <h2>หมวดหมู่สินค้า</h2>
                        <ul>
                            <li><a href="#">ดูสินค้าทั้งหมด</a></li>
                            <li><a href="#">ท่องเที่ยว</a></li>
                            <li><a href="#">บริหารธุรกิจ</a></li>
                            <li><a href="#">คอมพิวเตอร์</a></li>
                            <li><a href="#">ความรู้ทั่วไป</a></li>
                            <li><a href="#">การตลาด</a></li>
                        </ul>
                    </div>

                    <!--History-->
                    <div id="col_right_history" class="clearfix">
                        <h2>Your Recent History</h2>
                        <div class="right_item clearfix">
                            <a href="#">
                                <img src="/file/book/book02.png" alt="" />
                            </a>
                            <p><a href="#">Professional Database Programming with VB 2010 &amp; VC# 2010</a></p>
                        </div>
                    </div>

                    <!--Track & Trace-->
                    <div id="col_right_track" class="clearfix" >
                        <h2>Track &amp; Trace</h2>
                        <div>
                            <form action="http://track.thailandpost.co.th/trackinternet/Default.aspx" method="post" name="tracking_form" id="tracking_form">
                                <label>หมายเลขพัสดุไปรษณีย์</label>
                                <input type="text" name="TextBarcode" id="TextBarcode" />
                                <input type="hidden" value="Login" id="__EVENTTARGET" name="__EVENTTARGET" />
                                <input type="submit" value="ตรวจสอบ" />
                            </form>
                        </div>
                    </div><!-- end Track & Trace-->

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