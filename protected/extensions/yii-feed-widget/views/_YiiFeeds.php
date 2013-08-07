
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
<link rel="stylesheet" href="/css/animate.css"> <!-- Optional -->
<link rel="stylesheet" href="/css/liquid-slider.css">

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 -->
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/jquery.touchSwipe.min.js"></script>
<script src="/js/jquery.liquid-slider.min.js"></script>
<script>

$(document).ready(function($){
     $('#slider-id').liquidSlider({
      autoHeight: false,
      autoSlide: true,
      autoSlideInterval: 6000
  });
});
</script>
<style type="text/css">
  .rss_post {
    color: #777777;
    float: right;
  }
  i.icon-hand-right{
    color: goldenrod;
  }
  .rss_detail {
   
}
  .panel-wrapper h2{
   
  }
.rss_feed_box  {
/*    border-radius: 17px 17px 17px 17px;
*/    box-shadow: 1px 0 9px -1px #AAAAAA inset;
}

.ls-responsive .liquid-slider{
  padding: 15px 0px;
}



</style>
<!-- <div class="" >
     <div>
          <h2 class="title">Slide 1</h2>
          // Content goes here
     </div>
     <div>
          <h2 class="title">Slide 2</h2>
          // Content goes here
     </div>
     <div>
          <h2 class="title">Slide 3</h2>
          // Content goes here
     </div>
</div>
 -->


<div class="rss_feed_box  liquid-slider ra" id="slider-id">
    <?php
    foreach ($items as $item):
        ?>
        <!--<div class="yii-feed-widget-item">-->
        <div  class="rss_item " >
            <?php //echo $item->get_channel_tags();  ?>
            <a href="<?php echo $item->get_permalink(); ?>" target="_blank">

                <h2><i class='icon-hand-right ff9'></i>
                    <?php echo $item->get_title(); ?>
                </h2>

                <p class="rss_detail"><?php echo $item->get_description(); ?></p>
                <p class="rss_post"><small><?php echo Yii::t('language', 'เมื่อวันที่') . ' ' . $item->get_date('j/m/Y | H:i '); ?></small></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<div class="yii-feed-widget-clear"></div>