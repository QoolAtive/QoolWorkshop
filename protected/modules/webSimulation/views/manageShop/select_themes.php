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
                <?php
                echo CHtml::image('/img/layout/TP015.jpg', '', array(
                    'id' => 'tp1',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(15, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP015.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/TP014.jpg', '', array(
                    'id' => 'tp2',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(14, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP014.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/TP013.jpg', '', array(
                    'id' => 'tp3',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(3, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP013.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/TP012.jpg', '', array(
                    'id' => 'tp4',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(4, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP012.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/TP011.jpg', '', array(
                    'id' => 'tp5',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(5, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP011.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/TP010.jpg', '', array(
                    'id' => 'tp6',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(6, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP010.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/TP009.jpg', '', array(
                    'id' => 'tp7',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(7, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP009.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/TP008.jpg', '', array(
                    'id' => 'tp8',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(8, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP008.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/TP007.jpg', '', array(
                    'id' => 'tp9',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(9, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP007.jpg");
                    ?>
                </div>
            </li>
            <li>
                <?php
                echo CHtml::image('/img/layout/TP006.jpg', '', array(
                    'id' => 'tp10',
                    'width' => '128',
                    'height' => '110',
                    'onclick' => 'List.select(10, this);',
                ));
                ?>
                <div id="gallery">
                    <?php
                    echo CHtml::link('preview', "/img/layout/TP006.jpg");
                    ?>
                </div>
            </li>

        </ul>

        <p class="textcenter">
            <?php
            echo $this->hiddenField($model, 'theme', array(
                'id' => 'theme',
            ));
            echo CHtml::submitButton(Yii::t('language', 'ขั้นตอนเปิดร้านถัดไป >'), array(
                'class' => "purple",
            ));
            ?>
        </p>

        <?php $this->endWidget(); ?>
    </div>
</div>

<script>
    $(document).ready(function($) {
        var List = {
            init: function() {
                this.selectedItem = null;
            },
            select: function(i, t) {
                if (this.selectedItem) {
                    this.selectedItem.item.className = "";
                    this.selectedItem.text.className = "show_bg";
                }
                var o = document.getElementById("tp" + i);
                if (o) {
                    o.className = "selected";
                    t.className = "show_bg selectedTemp";
                }
                this.selectedItem = {index: i, item: o, text: t};
                var input = document.getElementById("selectedItem");
                alert('/img/layout/TP0' + this.selectedItem.index + '.jpg');
                $('#theme').val('/img/layout/TP0' + this.selectedItem.index + '.jpg');
            if (input)
                input.value = i;
            }
        };
        $(function() {
            List.init();
        });
    });
</script>