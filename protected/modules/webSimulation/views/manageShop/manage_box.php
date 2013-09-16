<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>

<div class="content">
    <div class="tabcontents" >
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php
                    $shop_name = WebShop::model()->findByPk($shop_id)->name_th;
                    echo Yii::t('language', 'ร้าน ') . $shop_name;
                    ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กล่องแสดงสินค้า'); ?>
            </span>
        </h3>

        <div class="_100">
            <!--class="addboxbtn fancybox.ajax btn"-->
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่มกล่องแสดงสินค้า'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/addBox")) . '"'));
            echo CHtml::button(Yii::t('language', 'ใส่โค๊ด html'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/addHtml")) . '"'));
            echo CHtml::button(Yii::t('language', 'วีดีโอ/เพลง'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/addVideo")) . '"'));
            echo CHtml::button(Yii::t('language', 'จัดลำดับกล่อง'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/sortBox")) . '"'));
            echo CHtml::button(Yii::t('language', 'จัดการรายการสินค้า'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageItem")) . '"'));
            ?>
            <!--        fancybox    
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/addBox')); ?>"> เพิ่มกล่องแสดงสินค้า </a>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/addHtml')); ?>">ใส่โค๊ด html </a>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/addVideo')); ?>">วีดีโอ/เพลง</a>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/sortBox')); ?>">จัดลำดับกล่อง</a>-->
        </div>
        <hr>

        <ul class="ws-boxadmin left">
            <?php
            $boxs = WebShopBox::model()->findAll(array('condition' => 'web_shop_id = ' . $shop_id, 'order' => 'order_n'));
            $i = 1;
            if ($boxs == NULL) {
                echo '<div class="_100">';
                echo Yii::t('language', 'ไม่พบกล่องแสดงสินค้า');
                echo '</div>';
            } else {
                foreach ($boxs as $box) {
                    ?>
                    <li id="recordsArray_<?php echo $i; ?>">
                        <p class="headsort"><?php echo $box['name_th']; ?></p>
                        <p class="tool">
                            <?php
                            echo CHtml::link('เพิ่มสินค้าในกล่อง', CHtml::normalizeUrl(array('/webSimulation/manageShop/addBoxItem', 'box_id' => $box['web_shop_box_id'])));
                            ?>
                            &nbsp;|&nbsp;
                            <?php
                            if ($box['type'] == '1') {
                                echo CHtml::link('แก้ไขสินค้าในกล่อง', CHtml::normalizeUrl(array('/webSimulation/manageShop/editBox', 'box_id' => $box['web_shop_box_id'])));
                            } else if ($box['type'] == '2') {
                                echo CHtml::link('แก้ไข', CHtml::normalizeUrl(array('/webSimulation/manageShop/addHtml', 'box_id' => $box['web_shop_box_id'])));
                            } else if ($box['type'] == '3') {
                                echo CHtml::link('แก้ไข', CHtml::normalizeUrl(array('/webSimulation/manageShop/addVideo', 'box_id' => $box['web_shop_box_id'])));
                            }
                            ?>
                            &nbsp;|&nbsp;
                            <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/deleteBox', 'box_id' => $box['web_shop_box_id'])); ?>"
                               onclick="return confirm('<?php echo Yii::t('language', 'คุณต้องการลบกล่องแสดงสินค้านี้หรือไม่?'); ?>');" >ลบ</a>
                            <!--                            &nbsp;|&nbsp;
                                                        <a href="#">แก้ไขการแสดงผล</a>-->
                            &nbsp;|&nbsp;
                            <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/showBox', 'box_id' => $box['web_shop_box_id'], 'is_show' => $box['show_box'])); ?>" class="hideshowbox">
                                <?php
                                if ($box['show_box']) {
                                    echo 'ซ่อน';
                                } else {
                                    echo 'แสดง';
                                }
                                ?>
                            </a>

                        </p>
                    </li>
                    <?php
                    $i += 1;
                }//END foreach
            }
            ?>
        </ul>   



        <?php
        $is_show = WebShopSideBox::model()->findByAttributes(array('web_shop_id' => $shop_id));
        ?>
        <ul class="ws-boxadmin right">
            <li>
                <?php
                echo Yii::t('language', 'ปฏิทิน');
                ?>
                <p class="tool">
                    <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/showSideBox', 'shop_id' => $shop_id, 'box_name' => 'calendar', 'is_show' => $is_show['calendar'])); ?>" class="hideshowbox">
                        <?php
                        if ($is_show['calendar']) {
                            echo 'ซ่อน';
                        } else {
                            echo 'แสดง';
                        }
                        ?>
                    </a>
                </p>
            </li>

            <li>
                <?php
                echo Yii::t('language', 'พยากรณ์อากาศ');
                ?>
                <p class="tool">
                    <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/showSideBox', 'shop_id' => $shop_id, 'box_name' => 'forecast', 'is_show' => $is_show['forecast'])); ?>" class="hideshowbox">
                        <?php
                        if ($is_show['forecast']) {
                            echo 'ซ่อน';
                        } else {
                            echo 'แสดง';
                        }
                        ?>
                    </a>
                </p>
            </li>

            <li>
                <?php
                echo Yii::t('language', 'อัตราดอกเบี้ยและอัตราแลกเปลี่ยน');
                ?>
                <p class="tool">
                    <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/showSideBox', 'shop_id' => $shop_id, 'box_name' => 'exchange', 'is_show' => $is_show['exchange'])); ?>" class="hideshowbox">
                        <?php
                        if ($is_show['exchange']) {
                            echo 'ซ่อน';
                        } else {
                            echo 'แสดง';
                        }
                        ?>
                    </a>
                </p>
            </li>

            <li>
                <?php
                echo Yii::t('language', 'ผลสลากกินแบ่ง');
                ?>
                <p class="tool">
                    <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/showSideBox', 'shop_id' => $shop_id, 'box_name' => 'lottery', 'is_show' => $is_show['lottery'])); ?>" class="hideshowbox">
                        <?php
                        if ($is_show['lottery']) {
                            echo 'ซ่อน';
                        } else {
                            echo 'แสดง';
                        }
                        ?>
                    </a>
                </p>
            </li>

            <li>
                <?php
                echo Yii::t('language', 'ราคาน้ำมัน');
                ?>
                <p class="tool">
                    <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/showSideBox', 'shop_id' => $shop_id, 'box_name' => 'oil', 'is_show' => $is_show['oil'])); ?>" class="hideshowbox">
                        <?php
                        if ($is_show['oil']) {
                            echo 'ซ่อน';
                        } else {
                            echo 'แสดง';
                        }
                        ?>
                    </a>
                </p>
            </li>

            <li>
                <?php
                echo Yii::t('language', 'ราคาทองคำ');
                ?>
                <p class="tool">
                    <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/showSideBox', 'shop_id' => $shop_id, 'box_name' => 'gold', 'is_show' => $is_show['gold'])); ?>" class="hideshowbox">
                        <?php
                        if ($is_show['gold']) {
                            echo 'ซ่อน';
                        } else {
                            echo 'แสดง';
                        }
                        ?>
                    </a>
                </p>
            </li>

            <li>
                <?php
                echo Yii::t('language', 'ดัชนีหุ้น');
                ?>
                <p class="tool">
                    <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/showSideBox', 'shop_id' => $shop_id, 'box_name' => 'stock', 'is_show' => $is_show['stock'])); ?>" class="hideshowbox">
                        <?php
                        if ($is_show['stock']) {
                            echo 'ซ่อน';
                        } else {
                            echo 'แสดง';
                        }
                        ?>
                    </a>
                </p>
            </li>
        </ul>

    </div>
</div>
