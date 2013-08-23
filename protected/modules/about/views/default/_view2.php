<!--        Contact-->
<div id="view2">
        <!-- MAP -->
        <!--                จุดที่ถูกต้อง ll=13.882871,100.486858-->
        <div id="map_correct">
            <iframe id="map" name="map" width="100%"  height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.th/maps/ms?msa=0&amp;msid=215785394891561682595.00046fbfefd4e8659fdc1&amp;ie=UTF8&amp;t=m&amp;source=embed&amp;ll=13.882871,100.486858&amp;spn=0.004166,0.016093&amp;output=embed"></iframe>
        </div>

        <!--                แก้ bug จุดที่ต้องการไปอยู่มุมซ้ายบน-->
        <!--        <div id="map_fix">
                    <iframe id="map" name="map" width="100%"  height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.th/maps/ms?msa=0&amp;msid=215785394891561682595.00046fbfefd4e8659fdc1&amp;ie=UTF8&amp;t=m&amp;source=embed&amp;ll=13.884662,100.478683&amp;spn=0.004166,0.016093&amp;output=embed"></iframe>
                </div>-->

        <div class="contentpage contact conpad">

            <ul class="contactus">   
                <h3><i class="icon-envelope-alt"></i><?php echo Yii::t('language', 'ติดต่อเรา'); ?></h3>

                <li><i class="icon-map-marker"></i><?php echo Yii::t('language', '44/100 ถนนนนทบุรี 1 ตำบลบางกระสอ อำเภอเมือง จังหวัดนนทบุรี 11000'); ?> 
                </li>
                <li>
                    <i class="icon-phone"></i><?php echo Yii::t('language', 'โทร. 0-2528-7600 ต่อ 3191,3192'); ?>
                    <i class="icon-print"></i><?php echo Yii::t('language', 'โทรสาร. 0-2547-5973'); ?> 
                    <i class="icon-phone-sign"></i><?php echo Yii::t('language', 'สายด่วน 1570'); ?>
                </li>

                <li>



                </li>
                <li>

                </li>
                <li>
                    <i class="icon-globe"></i>www.dbdmart.com
                </li>
                <li>
                    <i class="icon-envelope"></i>support@dbdmart.com 
                </li>
            </ul>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'sendmail-form',
            ));
            ?>
            <div class="_50">
                <?php
                echo CHtml::textField('name', '', array(
                    'class' => "span6 fieldrequire",
                    'style' => "display: block;",
                    'placeholder' => Yii::t('language', 'ชื่อของคุณ'),
                ));
                ?>

            </div>
            <div class="_50">

                <?php
                echo CHtml::textField('email', '', array(
                    'class' => "span6 fieldrequire",
                    'style' => "display: block;",
                    'placeholder' => Yii::t('language', 'อีเมล์'),
                ));
                ?>

            </div>

            <div  class="_50">
                <?php
                echo CHtml::textField('website', '', array(
                    'class' => "span6",
//                        'style' => "display: block;",
                    'placeholder' => Yii::t('language', 'เว็บไซต์'),
                ));
                ?>
            </div>

            <div  class="_100">
                <?php
                echo CHtml::textArea('description', '', array(
                    'class' => "span12",
                    'rows' => "4",
                    'cols' => "50",
                    'style' => "font: 100%/120% Verdana, Arial, Helvetica, sans-serif; display: block; height:100px;",
                    'placeholder' => Yii::t('language', 'รายละเอียด') . "...",
                ));
                ?>
            </div>

            <div class="_100 textcenter">
                <?php
                echo CHtml::submitButton(Yii::t('language', 'ส่ง'), array(
                    'submit' => CHtml::normalizeUrl(array('/about/default/sendmail'))));
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>

</div>