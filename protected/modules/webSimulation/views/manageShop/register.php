<?php
if ($model->web_shop_id == NULL) {
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            bootstro.start('.bootstro', {
                finishButton: ''
            });
        });
    </script>
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
    <div class="tabcontents">
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
                    <?php echo Yii::t('language', 'แก้ไข') . Yii::t('language', 'รายละเอียดร้านค้า'); ?>
                </span>
            </h3>
        <?php } ?>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'shop_detail-form',
            'htmlOptions' => array(
                'autocomplete' => 'off',
            ),
        ));
//        echo $form->errorSummary($model);
        ?>

        <?php
        if ($model->web_shop_id == NULL) {
            ?> 
            <div class="_100 bootstro" data-bootstro-step="0" data-bootstro-placement="top" data-bootstro-width="400px" data-bootstro-content="ระบบแนะนำการใช้งานจำลองการเปิดร้านค้าออนไลน์ " data-bootstro-title="แนะนำการใช้งาน" data-original-title="">
                <h4 class="reg clearfix" >- <?php echo Yii::t('language', 'ทดสองสมัครเปิดร้านค้าออนไลน์'); ?> -</h4>
            </div>
        <?php } ?>
        <div class="_50 bootstro clearfix" data-bootstro-step="1" data-bootstro-placement="top" data-bootstro-width="400px" data-bootstro-content="ชื่อร้านของคุณ ควรตั้งเป็นชื่อที่จดจำง่าย ไม่ยาวเกินไป " data-bootstro-title="แนะนำการใช้งาน" data-original-title="">
            <?php
            echo $form->labelEx($model, 'name_th');
            echo $form->textField($model, 'name_th', array(
                'class' => 'fieldrequire',
                'readonly' => isset($model->web_shop_id),
            ));
            echo $form->error($model, 'name_th');

            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en', array(
                'class' => 'fieldrequire',
                'readonly' => isset($model->web_shop_id),
            ));
            echo $form->error($model, 'name_en');
            ?>
        </div>

        <div class="_50 bootstro clearfix"  data-bootstro-step="2" data-bootstro-placement="top" data-bootstro-width="400px" data-bootstro-content="เลือกหมวดหมู่ร้านของคุณ เพื่อให้ง่ายต่อการค้นหา และแยกประภทของร้านค้า ทำให้ผู้ซื้อค้นหาร้านค้าของคุณได้ง่ายขึ้น" data-bootstro-title="แนะนำการใช้งาน :: สมัครสมาชิก" data-original-title="" >
            <?php
            echo $form->labelEx($model, 'web_shop_catagory_id');
            echo $form->dropdownList($model, 'web_shop_catagory_id', ShopCategory::getList(), array(
                'class' => "fieldrequire",
                'empty' => 'เลือก',
            ));
            echo $form->error($model, 'web_shop_catagory_id');
            ?>
        </div>
        <div class="_100 clearfix"></div>

        <div class="bootstro clearfix" style="display: inline-block;" data-bootstro-step="3" data-bootstro-placement="right" data-bootstro-width="400px" data-bootstro-content="รายละเอียดร้านค้าของคุณ สามารถใส่คำอธิบายเพื่อบอกว่าร้านค้าของคุณเป็นอย่างไร " data-bootstro-title="แนะนำการใช้งาน" data-original-title="">
            <!--        <div class="_100">
            <?php
            echo $form->labelEx($model, 'url');
            echo $form->textField($model, 'url', array(
                'class' => 'fieldrequire input_text form_input',
                'disabled' => 'disabled'
            ));
            echo $form->error($model, 'url');
            ?>
                        Url <input class="input_text form_input" type="text" value="" name="url" >
                    </div>-->

            <div class="_100 ">  
                <?php
                echo $form->labelEx($model, 'description_th');
                echo $form->error($model, 'description_th');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->textArea($model, 'description_th', array(
                    'class' => 'input_text_area',
                    'style' => "height: 100px;",
                    'rows' => "4",
                ));
                ?>
            </div>
            <div class="_100">  
                <?php
                echo $form->labelEx($model, 'description_en');
                echo $form->error($model, 'description_en');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->textArea($model, 'description_en', array(
                    'class' => 'input_text_area',
                    'style' => "height: 100px;",
                    'rows' => "4",));
                ?>
            </div>
        </div>

        <div class="bootstro clearfix"  data-bootstro-step="4" data-bootstro-placement="right" data-bootstro-width="400px" data-bootstro-content="ข้อมูลติดต่อของร้านค้า เพื่อเพิ่มความน่าเชื่อถือร้านค้าของคุณกับผู้ซื้อ และยังให้ผู้ซื้อติดต่อได้อย่างสะดวกรวดเร็ว เพิ่มโอกาสทางการค้ามากขึ้น" data-bootstro-title="แนะนำการใช้งาน" data-original-title="">
            <div class="_100">
                <h4 class="reg">- <?php echo Yii::t('language', 'รายละเอียดร้านค้าเพิ่มเติม'); ?> -</h4>
            </div>
            <div class="_100 textcenter">
                <span class="form_desc"><?php echo Yii::t('language', 'กรุณากรอกให้ครบถ้วน เพื่อความน่าเชื่อถือของร้านค้าคุณ'); ?></span>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'address_th');
                echo $form->textField($model, 'address_th', array('class' => 'fieldrequire'));
                echo $form->error($model, 'address_th');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'address_en');
                echo $form->textField($model, 'address_en', array('class' => 'fieldrequire'));
                echo $form->error($model, 'address_en');
                ?>
            </div>
            <div class="_25">
                <?php
                echo $form->labelEx($model, 'province_id');
                echo $form->dropdownList($model, 'province_id', Province::model()->getListProvince(), array(
                    'class' => "fieldrequire",
                    'empty' => 'เลือก',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('/site/provinceToPrefecture'),
                        'update' => '#WebShop_prefecture_id',
                        'data' => array('province' => 'js:this.value')
                    )
                ));
                echo $form->error($model, 'province_id');
                ?>
            </div>

            <div class="_25">
                <?php
                $list_prefecture = array();
                if ($model->prefecture_id != null) {
                    $list_prefecture = CHtml::listData(Prefecture::model()->findAll('province_id = :province_id', array(':province_id' => $model->province_id)), 'id', 'name_th');
                }
                echo $form->labelEx($model, 'prefecture_id');
                echo $form->dropdownList($model, 'prefecture_id', $list_prefecture, array(
                    'class' => "fieldrequire",
                    'empty' => 'เลือก',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('/site/PrefectureToDistrict'),
                        'update' => '#WebShop_district_id',
                        'data' => array('prefecture' => 'js:this.value')
                    )
                ));
                echo $form->error($model, 'prefecture_id');
                ?>
            </div>

            <div class="_25">
                <?php
                $list_district = array();
                if ($model->district_id != null) {
                    $list_district = CHtml::listData(District::model()->findAll('prefecture_id = :prefecture_id', array(':prefecture_id' => $model->prefecture_id)), 'id', 'name_th');
                }
                echo $form->labelEx($model, 'district_id');
                echo $form->dropdownList($model, 'district_id', $list_district, array(
                    'class' => "fieldrequire",
                    'empty' => 'เลือก',
                ));
                echo $form->error($model, 'district_id');
                ?>
            </div>

            <div class="_25">
                <?php
                echo $form->labelEx($model, 'postcode');
                echo $form->textField($model, 'postcode', array('class' => 'fieldrequire numberinput'));
                echo $form->error($model, 'postcode');
                ?>
            </div>
            <!-- line -->

            <div class="_33">
                <?php
                echo $form->labelEx($model, 'mobile');
                echo $form->textField($model, 'mobile', array('class' => 'fieldrequire'));
                echo $form->error($model, 'mobile');
                ?>
            </div>

            <div class="_33">
                <?php
                echo $form->labelEx($model, 'tel');
                echo $form->textField($model, 'tel', array('class' => ''));
                echo $form->error($model, 'tel');
                ?>
            </div>

            <div class="_33">
                <?php
                echo $form->labelEx($model, 'email');
                echo $form->textField($model, 'email', array('class' => 'fieldrequire'));
                echo $form->error($model, 'email');
                ?>
            </div>
        </div>
        <!-- line -->

        <div class="_100 textcenter bootstro" data-bootstro-content="กรอกข้อมูลเสร็จเรียบร้อย คลิ๊กเพื่อไปยังขั้นตอนถัดไป" data-bootstro-title="แนะนำการใช้งาน" data-original-title=""  data-bootstro-step="5" data-bootstro-placement="top" data-bootstro-width="400px"  style="margin-top: 50px;">
            <!-- go to select theme -->
            <?php
//            echo $form->hiddenField($model, 'url', array(
//                'id' => 'url',
//            ));
            if ($model->web_shop_id == NULL) {
                echo CHtml::submitButton(Yii::t('language', 'ขั้นตอนเปิดร้านถัดไป >'), array(
                    'class' => "purple",
                ));
            } else {
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array(
                    'class' => "purple",
                ));
                echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")) . '"'));
            }
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>

</div>