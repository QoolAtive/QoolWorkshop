<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/websim.png'); ?>"/></li>
        </ul>

    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'shop_detail-form',
            'htmlOptions' => array(
                'autocomplete' => 'off',
            ),
        ));
//        echo $form->errorSummary($model);
        ?>

        <div class="_100">
            <h4 class="reg">- <?php echo Yii::t('language', 'ทดสองสมัครเปิดร้านค้าออนไลน์'); ?> -</h4>
        </div>
        <div class="_50 bootstro" data-bootstro-content="แสดงสินค้าทั้งหมดที่อยู๋ในร้านของคุณ" data-bootstro-width="320px" data-bootstro-title="ส่วนแสดงสินค้า" data-bootstro-placement="top" data-bootstro-step="0">
            <?php
            echo $form->labelEx($model, 'name_th');
            echo $form->textField($model, 'name_th', array('class' => 'fieldrequire'));
            echo $form->error($model, 'name_th');

            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en', array('class' => 'fieldrequire'));
            echo $form->error($model, 'name_en');
            ?>
        </div>

        <div class="_50">
            <?php
            echo $form->labelEx($model, 'web_shop_catagory_id');
            echo $form->dropdownList($model, 'web_shop_catagory_id', ShopCatagory::getList(), array(
                'class' => "fieldrequire",
                'empty' => 'เลือก',
            ));
            echo $form->error($model, 'web_shop_catagory_id');
            ?>
        </div>

        <div class="_100">
            <?php
            echo $form->labelEx($model, 'url');
            echo $form->textField($model, 'url', array(
                'class' => 'fieldrequire input_text form_input',
                'disabled' => 'disabled'
            ));
            echo $form->error($model, 'url');
            ?>
            <!--Url <input class="input_text form_input" type="text" value="" name="url" >-->
        </div>

        <div class="_100">  
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
            echo $form->textField($model, 'tel', array('class' => 'fieldrequire'));
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
        <!-- line -->

        <div class="_100 textcenter" style="margin-top: 50px;">
            <!-- go to select theme -->
            <?php
            echo $form->hiddenField($model, 'url', array(
                'id' => 'url',
            ));
            echo CHtml::submitButton(Yii::t('language', 'ขั้นตอนเปิดร้านถัดไป >'), array(
                'class' => "purple",
            ));
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>

</div>