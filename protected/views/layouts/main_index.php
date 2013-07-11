<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" class="no-js">
    <head>
        <title>DBDmart.com</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"></meta>
        <meta charset="UTF-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
        <link rel="shortcut icon" href="favicon.ico" /></link>

        <!--CSS-->
        <link rel="stylesheet" href="/css/global.css" type="text/css"></link>
        <link rel="stylesheet" href="/css/style.css" type="text/css"></link>
        <link rel="stylesheet" href="/css/animate.css" type="text/css"></link>
        <link rel="stylesheet" href="/css/jquery.fancybox.css" type="text/css" media="screen" /></link>

        <!--JS-->
        <!--[if IE]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]--> 
        <script src="/js/jquery-1.9.0.min.js" type="text/javascript"></script>
        <script src="/js/modernizr.js" type="text/javascript"></script>
        <script src="/js/jquery.fancybox.js" type="text/javascript"></script>
        <script src="/js/tabcontent.js" type="text/javascript"></script>
        <script src="/js/config.js" type="text/javascript"></script>
    </head>
    <body class="bgindex">

        <!--wrapper-->
        <div id="wrapper" class="page pagepadding white pagecen pageborder">

            <!--#header-->
            <div id="header" class="headindex clearfix">
                <?php
                $this->renderPartial("//layouts/_index-logo");
                $this->renderPartial("//layouts/_index-menu_header")
                ?>           

            </div>
            <!--/#header-->

            <!--#container-->
            <div id="container" class="page clearfix smart"  >
                <?php echo $content; ?>
            </div><!-- container -->
            <div id="push"></div>

        </div>
        <!--/#wrapper-->

        <!--#footer-->
        <div id="footer" class="clearfix">
            <?php $this->renderPartial("//layouts/_index-footer"); ?>
        </div>
    </body>
</html>
