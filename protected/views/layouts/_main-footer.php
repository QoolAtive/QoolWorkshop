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
            echo Yii::t('language', 'โทร. 0-2528-7600 ต่อ 3191,3192');
            echo ' ' . Yii::t('language', 'โทรสาร. 0-2547-5973');
            echo ' ' . Yii::t('language', 'สายด่วน 1570');
            ?>
        </div>
        <div class="footright">
             <a href="/index.php/about/default/index/view/3">Sitemap</a>
            <?php
            $this->widget('application.extensions.addThis.addThis', array(
                'id' => 'addThis',
                'username' => 'username',
                'defaultButtonCaption' => 'Share',
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
        </div>
    </div>
</div>