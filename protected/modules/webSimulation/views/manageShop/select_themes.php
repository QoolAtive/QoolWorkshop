<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/websim.png'); ?>"/></li>
        </ul>

    </div>
</div>
<div class="content">
    <div class="tabcontents" >
        <?php
        $form = $this->beginWidget('CActiveForm', array(
        'id' => 'shop_themes-form',
        ));
//        echo $form->errorSummary($model);
        ?>
                <!-- THEME -->
                <h3 class="headfont _100"> Themes </h3>
                <ul class="clearfix" id="template">
                    <li>
                        <img width="128" height="110" id="tp1"  onclick="List.select(1, this);" alt="" src="/img/layout/TP015.jpg">
                        <div id="gallery">
                                    <?php
                                    echo CHtml::link('preview', CHtml::normalizeUrl(array("/img/layout/TP015.jpg")));
                    ?>
                </div>
            </li>
            <li>
                <img width="128" height="110" id="tp2"  onclick="List.select(2, this);"  alt="" src="img/layout/TP014.jpg">
                <div id="gallery">
                    <a href="/img/layout/TP014.jpg">preview</a>
                </div>
            </li>
            <li>
                <img width="128" height="110" id="tp3"  onclick="List.select(3, this);" alt="" src="img/layout/TP013.jpg">
                <div id="gallery">
                    <a href="img/layout/TP013.jpg">preview</a>
                </div>
            </li>
            <li>
                <img width="128" height="110" id="tp4"  onclick="List.select(4, this);"  alt="" src="img/layout/TP012.jpg">
                <div id="gallery">
                    <a href="img/layout/TP012.jpg">preview</a>
                </div>
            </li>
            <li>
                <img width="128" height="110" id="tp5"   onclick="List.select(5, this);"alt="" src="img/layout/TP011.jpg" >
                <div id="gallery">
                    <a href="img/layout/TP011.jpg">preview</a>
                </div>
            </li>
            <li>
                <img width="128" height="110" id="tp6"   onclick="List.select(6, this);" alt="" src="img/layout/TP010.jpg" >
                <div id="gallery">
                    <a href="img/layout/TP010.jpg">preview</a>
                </div>
            </li>
            <li>
                <img width="128" height="110" id="tp7"   onclick="List.select(7, this);" alt="" src="img/layout/TP009.jpg">
                <div id="gallery">
                    <a href="img/layout/TP009.jpg">preview</a>
                </div>
            </li>
            <li>
                <img width="128" height="110" id="tp8"  onclick="List.select(8, this);" alt="" src="img/layout/TP008.jpg">
                <div id="gallery">
                    <a href="img/layout/TP008.jpg">preview</a>
                </div>
            </li>
            <li>
                <img width="128" height="110" id="tp9"   onclick="List.select(9, this);" alt="" src="img/layout/TP007.jpg">
                <div id="gallery">
                    <a href="img/layout/TP007.jpg">preview</a>
                </div>
            </li>
            <li>
                <img width="128" height="110" id="tp10"  onclick="List.select(10, this);" alt="" src="img/layout/TP006.jpg">
                <div id="gallery">
                    <a href="img/layout/TP006.jpg">preview</a>
                </div>
            </li>

        </ul>

        <p class="textcenter">
            <input class="purple" onclick="window.location = 'web-sim-finish.html'" type="submit" name="yt0" value="ขั้นตอนเปิดร้านถัดไป >">
        </p>
        
        <?php $this->endWidget(); ?>
    </div>
</div>
