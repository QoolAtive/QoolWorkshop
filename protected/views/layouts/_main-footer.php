<div id="footer" class="clearfix">
    <div class="page">
        <div class="foottext"> 
            <?php
            echo Yii::t('language', 'สำนักพาณิชย์อิเล็กทรอนิกส์');
            echo ' ' . Yii::t('language', 'กรมพัฒนาธุรกิจการค้า');
            echo ' ' . Yii::t('language', 'กระทรวงพาณิชย์');
            ?> 
            </br>

            <?php
            echo '44/100';
            echo ' ' . Yii::t('language', 'ถนนนนทบุรี 1');
            echo ' ' . Yii::t('language', 'ตำบลบางกระสอ');
            echo ' ' . Yii::t('language', 'อำเภอเมือง');
            echo ' ' . Yii::t('language', 'จังหวัดนนทบุรี');
            echo ' 11000';
            echo ' ' . Yii::t('language', 'ประเทศไทย');
            ?>
            </br>

            <?php
            echo Yii::t('language', 'โทร. 0-2547-5959');
            echo ' ' . Yii::t('language', 'โทรสาร. 0-2547-5973');
            echo ' ' . Yii::t('language', 'สายด่วน 1570');
            ?>
        </div>
        <div class="footright">

            <?php
            $this->widget('application.extensions.addThis.addThis', array(
                'id' => 'addThis',
                'username' => 'username',
                'defaultButtonCaption' => Yii::t('language', 'แบ่งปัน'),
                'showDefaultButton' => true,
                'showDefaultButtonCaption' => true,
                'separator' => '|',
                'htmlOptions' => array(),
                'linkOptions' => array(),
                'showServices' => array('facebook', 'twitter', 'myspace', 'email', 'print'),
                'showServicesTitle' => false,
                'config' => array('ui_language' => 'th'),
                'share' => array(),
                    )
            );
            ?>
            <div class="footrtext">
                <a href="/index.php/about/default/siteMap">
                    <?php echo Yii::t('language', 'แผนผังเว็บไซต์'); ?>
                </a>
                 | 
                <a class="createaccountbtn fancybox" href="/member/default/rules">
                    <?php echo Yii::t('language', 'นโยบายและเงื่อนไขการใช้งาน'); ?>
                </a>
            </div>
        </div>
    </div>
</div>