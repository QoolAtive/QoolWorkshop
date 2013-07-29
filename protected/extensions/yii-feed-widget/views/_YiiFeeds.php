<style type="text/css">
    .rss_feed_box{
        height: 400px;
        overflow: auto;
        margin: 3px 5%;
    }
    .rss_item{        
        padding: 5px 25px; 
        font-size: 0.9em;
        color: #666666; 
        text-decoration:none; 

    }
    .rss_item:hover {
        color:#339;
        background:#d0dafd;
    }
    a{
        /*        font-family:Arial, "times New Roman", tahoma;
                font-size:12px;	
                font-weight:bold;*/
        color: #666666; 
        /*background-color:#F5F5F5;*/
        text-decoration:none;
    }
    /*    a:hover{
            font-family:Arial, "times New Roman", tahoma;
            font-size:12px;	
            font-weight:bold;
            color:#FF3300;
            background-color:#F5F5F5;
            text-decoration:none;
        }*/
    h2{
        font-size: 1.3em;
        color: #8500B2; 
        font-weight: bold;
    }
    .ff9{
        /*color: #ff9933;*/
        color: #ff6600;
        padding: 0 5px 0 0;
    }
    .rss_detail{
        padding-left: 20px;
        font-size: 1.1em;
    }
    .rss_post{
        text-align: right;
        color: #000000;
    }

</style>

<?php
/**
 * FileDoc: 
 * View Partial for YiiFeedWidget.
 * This extension depends on both idna convert and Simple Pie php libraries
 *  
 * PHP version 5.3
 * 
 * @category Extensions
 * @package  YiiFeedWidget
 * @author   Richard Walker <richie@mediasuite.co.nz>
 * @license  BSD License http://www.opensource.org/licenses/bsd-license.php
 * @link     http://mediasuite.co.nz
 * @see      simplepie.org
 * @see      http://www.phpclasses.org/browse/file/5845.html
 * 
 */
?>
<div class="rss_feed_box">
    <?php
    foreach ($items as $item):
        ?>
        <!--<div class="yii-feed-widget-item">-->
        <div  class="rss_item">
            <?php //echo $item->get_channel_tags();  ?>
            <a href="<?php echo $item->get_permalink(); ?>" target="_blank">

                <h2><i class='icon-hand-right ff9'></i>
                    <?php echo $item->get_title(); ?>
                </h2>

                <p class="rss_detail"><?php echo $item->get_description(); ?></p>
                <p class="rss_post"><small><?php echo Yii::t('language', 'เมื่อวันที่') . ' ' . $item->get_date('j/m/Y | H:i '); ?></small></p>
            </a>
        </div>
        <hr>
    <?php endforeach; ?>
</div>
<div class="yii-feed-widget-clear"></div>