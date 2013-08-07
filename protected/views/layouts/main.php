<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if (!ereg("[.]+", Yii::app()->request->getUrl())) {
    Yii::app()->user->returnUrl = Yii::app()->request->getUrl();
}
?>
<html lang="en" class="no-js">
    <head>
        <title>DBDmart.com</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"></meta>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>

        <!--CSS-->
        <link rel="stylesheet" href="/css/global.css"  type="text/css"></link>
        <link rel="stylesheet" href="/css/style.css"  type="text/css"></link>
        <link rel="stylesheet" href="/css/tabcontent.css" type="text/css"></link>
        <link rel="stylesheet" href="/css/animate.css"  type="text/css"></link>
        <link rel="stylesheet" href="/css/jquery.fancybox.css" type="text/css"></link>
        <link rel="stylesheet" href="/css/fullcalendar.css"  type="text/css"></link>
        <link rel="stylesheet" href="/css/orbit.css"  type="text/css"></link>
        <link rel="stylesheet" href="/css/fonticon/font-awesome.css" type="text/css"></link>

        <!--JS-->
        <!--<script src="/js/jquery-1.9.0.min.js" type="text/javascript"></script>-->
        <script src="/js/modernizr.js" type="text/javascript"></script>
        <script src="/js/jquery.fancybox.js" type="text/javascript"></script>
        <script src="/js/tabcontent.js" type="text/javascript"></script>
        <script src="/js/jquery.orbit-1.2.3.js" type="text/javascript"></script>
        <script src="/js/fullcalendar.js"></script>
        <script src="/js/config.js" type="text/javascript"></script>
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrapper"> 

            <!--head-->
            <div id="header" class="headerpage clearfix">
                <div  class="page" >

                    <!-- logo -->
                    <?php echo $this->renderPartial("//layouts/_main-logo"); ?>

                    <!--right side top menu-->
                    <?php echo $this->renderPartial("//layouts/_main-menu_head"); ?>
                </div>
            </div><!--head-->

            <!-- container -->
            <div id="container"  class="bg clearfix">
                <div class="page pageborder white clearfix" >
                    <?php echo $content; ?>
                </div>
            </div><!-- container -->

            <!-- footer -->
            <?php echo $this->renderPartial("//layouts/_main-footer"); ?>
        </div><!-- page -->

    </body>
</html>
