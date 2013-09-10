<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if (!ereg("[.]+", Yii::app()->request->getUrl())) {
    Yii::app()->user->returnUrl = Yii::app()->request->getUrl();
}

$title = TitleWeb::model()->find('status = :status', array(':status' => 1));
$description = Description::model()->find('status = :status', array(':status' => 1));
?>
<html lang="en" class="no-js">
    <head>
        <title><?php echo $title->detail; ?></title>
        <meta content="<?php echo $description->detail; ?>" name="description"></meta>
        <meta content="<?php echo $key; ?>" name="keywords"></meta>
        
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"></meta>
        <meta charset="UTF-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
        <link rel="shortcut icon" href="favicon.ico" /></link>

        <!--CSS-->
        <link rel="stylesheet" href="/css/global.css" type="text/css"></link>
        <link rel="stylesheet" href="/css/style.css" type="text/css"></link>
        <link rel="stylesheet" href="/css/responsive.css" type="text/css">
        <link rel="stylesheet" href="/css/animate.css" type="text/css"></link>
        <link rel="stylesheet" href="/css/jquery.fancybox.css" type="text/css" media="screen" /></link>

        <!--JS-->
        <!--[if IE]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]--> 
        <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
                    <script src="/js/modernizr.js" type="text/javascript"></script>
                    <script src="/js/jquery.fancybox.js" type="text/javascript"></script>
                    <script src="/js/tabcontent.js" type="text/javascript"></script>
                    <script src="/js/jquery.orbit-1.2.3.js" type="text/javascript"></script>
                    <script src="/js/fullcalendar.js"></script>
                    <script src="/js/evol.colorpicker.js" type="text/javascript" charset="utf-8"></script>
                    <script src="/js/bootstro.js"></script>
                    <script src="/js/config.js" type="text/javascript"></script>
        <style type="text/css">
            #container {

                padding: 3% 0 !important;
                position: fixed;
                top: 1%;
                height: auto;
            }

        </style>
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
                <div class="smart clearfix">
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
