<div class="content" style="padding: 0% 11.5%;">
    <div class="row-fluid">
        <h3> <img src="/img/iconform.png"> <?php echo Yii::t('language', 'แก้ไขที่อยู่'); ?>  </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="_100">
            <h4 class="reg">- <?php echo Yii::t('language', 'ที่อยู่เดิม'); ?> -</h4>
        </div>
        <div class="_100">
            <div style="text-align: center;">
                <?php echo $address; ?>
            </div>
        </div>
        <div class="_100">
            <h4 class="reg">- <?php echo Yii::t('language', 'ที่อยู่ใหม่'); ?> -</h4>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'address');
            echo $form->textField($model, 'address');
            echo $form->error($model, 'address');
            ?>
        </div>
        <!-- new line -->

        <div class="_25">
            <?php
            echo $form->labelEx($model, 'province');
            echo $form->dropdownList($model, 'province', Province::model()->getListProvince(), array(
                'class' => "span2",
                'empty' => 'เลือก',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('/site/provinceToPrefecture'),
                    'update' => '#ChangeAddressForm_prefecture',
                    'data' => array('province' => 'js:this.value')
                )
            ));
            echo $form->error($model, 'province');
            ?>
        </div>
        <div class="_25">
            <?php
            echo $form->labelEx($model, 'prefecture');
            echo $form->dropdownList($model, 'prefecture', array(), array(
                'class' => "span2",
                'empty' => 'เลือก',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('/site/PrefectureToDistrict'),
                    'update' => '#ChangeAddressForm_district',
                    'data' => array('prefecture' => 'js:this.value')
                )
            ));
            echo $form->error($model, 'prefecture');
            ?>
        </div>


        <div class="_25">
            <?php
            echo $form->labelEx($model, 'district');
            echo $form->dropdownList($model, 'district', array(), array(
                'class' => "span2",
                'empty' => 'เลือก',
            ));
            echo $form->error($model, 'district');
            ?>
        </div>
        <div class="_25">
            <?php
            echo $form->labelEx($model, 'postcode');
            echo $form->textField($model, 'postcode', array(
                'class' => 'span5',
                    // 'placeholder' => MemPerson::model()->getAttributeLabel('postcode'),
            ));
            echo $form->error($model, 'postcode');
            ?>
        </div>
        <div class="_100"></div>
        <div class="_100 textcen">
            <?php
            echo CHtml::submitButton(Yii::t('language', 'ยืนยันการแก้ไขที่อยู่'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/member/manage/profile'
                )) . "'")
            );
            ?>
        </div> 
        <?php $this->endWidget(); ?>
    </div>
</div>


