<script type="text/javascript">

$(".newsslide").responsiveSlides({
  
  speed: 500,            // Integer: Speed of the transition, in milliseconds
    timeout: 6000,          // Integer: Time between slide transitions, in milliseconds
  pager: false,           // Boolean: Show pager, true or false
  nav: false,             // Boolean: Show navigation, true or false
  random: false,          // Boolean: Randomize the order of the slides, true or false
  pause: false,           // Boolean: Pause on hover, true or false
  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
  prevText: "Previous",   // String: Text for the "previous" button
  nextText: "Next",       // String: Text for the "next" button
  // maxwidth: "696",           // Integer: Max-width of the slideshow, in pixels
  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
  manualControls: "",     // Selector: Declare custom pager navigation
  namespace: "newsslide",   // String: Change the default namespace used
  before: function(){},   // Function: Before callback
  after: function(){}     // Function: After callback
});

</script>
<style type="text/css">
.rss_item {
    padding: 25px;
    display: inline-block;
}
.rslides {
  position: relative;
  list-style: none;
  overflow: hidden;
  width: 100%;
  padding: 0;
  margin: 0;
  box-shadow: 1px 0 9px -1px #AAAAAA inset;
  display: inline-block;
/*    max-width: 696px;
*/    border-radius: 10px;
    min-height: 130px;
  }

.rslides li {
  -webkit-backface-visibility: hidden;
  position: absolute;
  display: none;
  width: 100%;
  left: 0;
  top: 0;
  }

.rslides li:first-child {
  position: relative;
  display: block;
  float: left;
  }

.rslides a {
  display: block;
  height: auto;
  float: left;
  width: 100%;
  border: 0;
  }
  </style>

<ul class="newsslide rslides">

    <?php
    foreach ($items as $item):
        ?>
        <!--<div class="yii-feed-widget-item">-->

 <li>
        <div  class="rss_item " >
            <?php //echo $item->get_channel_tags();  ?>
            <a href="<?php echo $item->get_permalink(); ?>" target="_blank">

                <h2><i class='icon-hand-right ff9'></i>
                    <?php echo $item->get_title(); ?>
                </h2>

                <p class="rss_detail"><?php echo $item->get_description(); ?></p>
                <p class="rss_post"><small><?php echo Yii::t('language', 'เมื่อวันที่') . ': ' . $item->get_date('j/m/Y | H:i '); ?></small></p>
            </a>
        </div>
          </li>
    <?php endforeach; ?>

</div>

</ul>
<div class="yii-feed-widget-clear"></div>