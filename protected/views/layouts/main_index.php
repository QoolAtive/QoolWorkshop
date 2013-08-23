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

        <style type="text/css">
            #container {

                padding: 3% 0 !important;
                position: fixed;
                top: 1%;
                height: auto;
            }

        </style>
        
        <script>
                    (function(i, s, o, g, r, a, m) {
                        i['GoogleAnalyticsObject'] = r;
                        i[r] = i[r] || function() {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date();
                        a = s.createElement(o),
                                m = s.getElementsByTagName(o)[0];
                        a.async = 1;
                        a.src = g;
                        m.parentNode.insertBefore(a, m)
                    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                    ga('create', 'UA-43356253-1', 'qoolative.com');
                    ga('send', 'pageview');
                </script>
    </head>
    <body class="bgindex">

        <!--wrapper-->
        <div id="wrapper" class="page pagepadding white pagecen pageborder">


            <!--#container-->
            <div id="container" class="page clearfix">
                <div class="clearfix" style=" height:20%;  padding-bottom: 25px;">

                    <div id="header" class="headindex clearfix">


                        <?php
                        $this->renderPartial("//layouts/_index-logo");
                        $this->renderPartial("//layouts/_index-menu_header");
                        ?>  

                    </div>

                </div>
                <div style=" height:80%;" class="smart clearfix">
                    <?php echo $content; ?>
                </div>

            </div><!-- container -->

        </div>
        <!--/#wrapper-->

        <!--#footer-->
        <div id="footer" class="clearfix">
            <?php $this->renderPartial("//layouts/_index-footer"); ?>
        </div>
    </body>
</html>
