<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/about.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <!--            <li><a href="#" rel="view1">About</a></li>-->
            <li><?php echo CHtml::link(Yii::t('language', 'เกี่ยวกับเรา'), '#', array('rel' => 'view1')); ?></li>
            <!--            <li><a href="#" rel="view2">Contact</a></li>-->
            <li><?php echo CHtml::link(Yii::t('language', 'ติดต่อเรา'), '#', array('rel' => 'view2')); ?></li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                ?>
                <li>
                    <?php
                    echo CHtml::link(
                            Yii::t('language', 'แก้ไขข้อความ') . "<br/>" . Yii::t('language', 'เกี่ยวกับเรา'), CHtml::normalizeUrl(
                                    array('/about/default/editAbout')
                            )
                    );
                    ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <!--        About Us-->

        <img src="<?php echo Yii::t('language', '/img/banner/about.png'); ?>" class="pagebanner" alt="pagebanner"/>

        <div id="view1" class="tabcontent ">

            <?php
//            if (Yii::app()->user->isAdmin()) {
//                echo CHtml::ajaxButton(Yii::t('language', 'แก้ไข'), CHtml::normalizeUrl(array('/about/default/editAbout')), array('update' => '#view1')
//                );
//            }
            ?>
            <div id="text" class="row-fluid ">
                <?php
                $model_text = About::model()->find();
                echo $model_text->about_text_th;
                ?>
            </div>
        </div>
        <!--        <div id="view1" class="tabcontent ">-->

        <!--        Contact-->
        <div id="view2" class="tabcontent ">
            <div class="row-fluid fade">
                <!-- MAP -->
                <!--                จุดที่ถูกต้อง ll=13.882871,100.486858-->
                <div id="map_correct" style="display: none;">
                    <iframe id="map" name="map" width="100%"  height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.th/maps/ms?msa=0&amp;msid=215785394891561682595.00046fbfefd4e8659fdc1&amp;ie=UTF8&amp;t=m&amp;source=embed&amp;ll=13.882871,100.486858&amp;spn=0.004166,0.016093&amp;output=embed"></iframe>
                </div>

                <!--                แก้ bug จุดที่ต้องการไปอยู่มุมซ้ายบน-->
                <div id="map_fix">
                    <iframe id="map" name="map" width="100%"  height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.th/maps/ms?msa=0&amp;msid=215785394891561682595.00046fbfefd4e8659fdc1&amp;ie=UTF8&amp;t=m&amp;source=embed&amp;ll=13.884662,100.478683&amp;spn=0.004166,0.016093&amp;output=embed"></iframe>
                </div>

                <div class="contentpage contact conpad">
                    <ul style="margin: 20px 0; margin-left: 10px;">   
                        <li><h3><?php echo Yii::t('language', 'ติดต่อเรา'); ?></h3></li>
                        <?php
                        #ไม่ใช้ปุ่ม edit แล้ว
//                        if (Yii::app()->user->isAdmin()) {
//                            echo CHtml::ajaxButton(Yii::t('language', 'แก้ไข'), CHtml::normalizeUrl(array(
//                                        '/about/default/editContact')), array(
//                                'update' => '#view2')
//                            );
//                        }
                        ?>
                        <li>
                            <img src="/img/icon/pin.png"  height="16" />
                            <?php echo Yii::t('language', '44/100 ถนนนนทบุรี 1 ตำบลบางกระสอ อำเภอเมือง จังหวัดนนทบุรี 11000'); ?> 
                        </li>
                        <li>
                            <img src="/img/icon/phone.png" height="16"/>  
                            <ul class="list_tel">
                                <li><?php echo Yii::t('language', 'โทร. 0-2528-7600 ต่อ 3191,3192'); ?> </li>
                                <li><?php echo Yii::t('language', 'โทรสาร. 0-2547-5973'); ?> </li>
                                <li><?php echo Yii::t('language', 'สายด่วน 1570'); ?> </li>
                            </ul>
                        </li>
                        <li>
                            <img src="/img/icon/world.png" height="16"/>www.dbdmart.com
                        </li>
                        <li>
                            <img src="/img/icon/mail.png"  height="16"/>support@dbdmart.com 
                        </li>
                    </ul>

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'sendmail-form',
                    ));
                    echo CHtml::textField('name', '', array(
                        'class' => "span6 fieldrequire",
                        'style' => "display: block;",
                        'placeholder' => Yii::t('language', 'ชื่อของคุณ'),
                    ));
                    echo CHtml::textField('email', '', array(
                        'class' => "span6 fieldrequire",
                        'class' => "frequire",
                        'style' => "display: block;",
                        'placeholder' => Yii::t('language', 'อีเมล์'),
                    ));
                    echo CHtml::textField('website', '', array(
                        'class' => "span6",
//                        'style' => "display: block;",
                        'placeholder' => Yii::t('language', 'เว็บไซต์'),
                    ));
                    echo CHtml::textArea('description', '', array(
                        'class' => "span12",
                        'rows' => "4",
                        'cols' => "50",
                        'style' => "display: block;",
                        'placeholder' => Yii::t('language', 'รายละเอียด')."...",
                    ));

                    echo CHtml::submitButton(Yii::t('language', 'ส่ง'), array(
                        'submit' => CHtml::normalizeUrl(array('/about/default/sendmail'))));
                   $this->endWidget();
                   ?>
                </div>

            </div>

        </div>
        <!--        <div id="view2" class="tabcontent ">-->
    </div>
</div>
<!-- end <div class="content">-->

<script>
    $(document).ready(function() {
//            $('#map_correct').hide();
        if (location.hash == "#view2") {
            $('#map_correct').show();
            $('#map_fix').hide();
        }
    });
</script>