<script type="text/javascript">
    $(document).ready(function(){
bootstro.start('.bootstro', {
               
                    finishButton : ''
                });    
                    });
</script>

<?php
if ($model->web_shop_id == NULL) {
    ?>
    <div class="sidebar">
        <div class="menuitem">
            <ul>
                <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/websim.png'); ?>"/></li>
            </ul>

        </div>
    </div>
    <?php
} else {
    $this->renderPartial('_side_menu', array('index' => 'shop'));
}
?>
<div class="content">
    <div class="tabcontents" >
        <?php
        if ($model->web_shop_id != NULL) {
            ?>
            <h3 class="barH3">
                <span>
                    <i class="icon-shopping-cart"></i>
                    <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                        <?php
                        $shop_name = WebShop::model()->findByPk($model->web_shop_id)->name_th;
                        echo Yii::t('language', 'ร้าน ') . $shop_name;
                        ?>
                    </a>
                    <i class="icon-chevron-right"></i>
                    <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                    </a>
                    <i class="icon-chevron-right"></i>
                    <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopFormat")); ?>">
    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รูปแบบร้านค้า'); ?>
                    </a>
                    <i class="icon-chevron-right"></i>
    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'เลือกธีมร้านค้า'); ?>
                </span>
            </h3>
        <?php } ?>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'shop_themes-form',
        ));
//        echo $form->errorSummary($model);
        ?>
        <!-- THEME -->
        <h3 class="headfont _100 bootstro" data-bootstro-step="0" data-bootstro-placement="top" data-bootstro-width="400px" data-bootstro-content="Theme ส่วนนี้จะเป็นการเลือกธีมให้ร้านค้าของคุณ เลือกให้เหมาะกับสินค้าของคุณ จะช่วยเพิ่มความสวยงามความน่าเชื่อถือและยอดขายของร้านคุณ  " data-bootstro-title="แนะนำการใช้งาน" data-original-title=""> Themes </h3>
        <ul class="clearfix bootstro" id="template" data-bootstro-step="3" data-bootstro-placement="right" data-bootstro-width="400px" data-bootstro-content="มีธีมกว่า 10 แบบให้เลือกใช้งาน" data-bootstro-title="แนะนำการใช้งาน" data-original-title="">
            <li>
              <div class="bootstro"   data-bootstro-step="1" data-bootstro-placement="top" data-bootstro-width="400px" data-bootstro-content="คุณสามารถเลือกธีมร้านค้าของคุณโดยการคลิ๊กทีธีมนั้น " data-bootstro-title="แนะนำการใช้งาน" data-original-title=""> 
                <?php
                echo CHtml::image('/img/layout/tp001.jpg', '', array(
                    'id' => 'tp1',
                    'width' => '128',
                    'height' => '110',

                    'onclick' => 'List.select(1, this);',
                ));
                ?>
            </div>
                <div id="gallery" class="bootstro"   data-bootstro-step="2" data-bootstro-placement="bottom" data-bootstro-width="400px" data-bootstro-content="คุณสามารถคลิ๊กเพื่อดูตัวอย่างก่อนได้" data-bootstro-title="แนะนำการใช้งาน" data-original-title="">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp001.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/tp002.jpg', '', array(
                    'id' => 'tp2',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(2, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp002.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/tp003.jpg', '', array(
                    'id' => 'tp3',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(3, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp003.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/tp004.jpg', '', array(
                    'id' => 'tp4',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(4, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp004.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/tp005.jpg', '', array(
                    'id' => 'tp5',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(5, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp005.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/tp006.jpg', '', array(
                    'id' => 'tp6',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(6, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp006.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/tp007.jpg', '', array(
                    'id' => 'tp7',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(7, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp007.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/tp008.jpg', '', array(
                    'id' => 'tp8',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(8, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp008.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/tp009.jpg', '', array(
                    'id' => 'tp9',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(9, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp009.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/tp010.jpg', '', array(
                    'id' => 'tp10',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(10, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/tp010.jpg");
                    ?>
                </div>
            </li>

        </ul>

        <p class="textcenter bootstro" data-bootstro-step="4" data-bootstro-placement="top" data-bootstro-width="400px" data-bootstro-content="เมื่อเลือกเสร็จแล้วก็ไปยังขั้นตอนต่อไปกันเลย " data-bootstro-title="แนะนำการใช้งาน" data-original-title="">
            <?php
            echo $form->hiddenField($model, 'theme', array(
                'id' => 'theme',
                'value' => ''
            ));
            if ($model->web_shop_id == NULL) {
                echo CHtml::submitButton(Yii::t('language', 'ขั้นตอนเปิดร้านถัดไป >'), array(
                    'class' => "purple",
                ));
            } else {
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array(
                    'class' => "purple",
                ));
                echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopFormat")) . '"'));
            }
            ?>
        </p>

<?php $this->endWidget(); ?>
    </div>
</div>