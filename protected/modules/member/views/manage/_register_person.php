<script type="text/javascript" >
    $(document).ready(function() {
        $(".person").hide();
        $("#MemPerson_province").change(function() {
//            if ($("#MemPerson_province option:selected").val() == "") {
            $("#MemPerson_district option:eq(0)").attr("selected", "selected");
//            }
        });
        $("[id^=MemPerson_mem_type_]").change(function(){
            if($("#MemPerson_mem_type_0").is(':checked')){
                $(".person").hide();
            }
            if($("#MemPerson_mem_type_1").is(':checked')){
                $(".person").show();
            }
        });
    });
</script>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/createaccount.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => Yii::t('language', 'บุคคลธรรมดา'), 'link' => '/member/manage/registerPerson', 'select' => 'selected'),
                array('text' => Yii::t('language', 'นิติบุคคล'), 'link' => '/member/manage/registerRegistration', 'select' => ''),
            );
            echo Tool::GenList($list);
            ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent" >
            <div class="_100">    
                <h3> <img src="/img/iconform.png"><?php echo Yii::t('language', 'แบบลงทะเบียนสำหรับบุคคลธรรมดา'); ?></h3> 
            </div>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'insert-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => true,
//                'clientOptions' => array(
//                    'validateOnSubmit' => false,
//                ),
                'htmlOptions' => array(
                    'autocomplete' => 'off',
                )
            ));
            ?>
            <div class="_100">
                <h4 class="reg">- <?php echo Yii::t('language', 'ข้อมูลสมาชิก'); ?> -</h4>
            </div>

            <!-- username -->
            <div class="_100">    
                <?php
                echo $form->labelEx($model_user, 'username');
                echo $form->textField($model_user, 'username', array(
                    'class' => 'numberinput fieldrequire',
                    'placeholder' => Yii::t('language', 'เลขบัตรประจำตัวประชาชน'),
                        // 'placeholder' => MemUser::model()->getAttributeLabel('username'),
                ));
                echo $form->error($model_user, 'username');
                ?>
                <!--<label>
                <?php echo '*' . MemUser::model()->getAttributeLabel('username') . Yii::t('language', ' ต้องระบุเป็นเลขบัตรประจำตัวประชาชนเท่านั้น'); ?>
                </label>
                -->            </div>
            <!-- new line -->

            <!-- password -->
            <div class="_50"> 
                <?php
                echo $form->labelEx($model_user, 'password');
                echo $form->passwordField($model_user, 'password', array(
                    'class' => 'span6 fieldrequire',
                    'placeholder' => MemUser::model()->getAttributeLabel('password'),
                ));
                echo $form->error($model_user, 'password');
                ?>
            </div>
            <div class="_50">
                <?php
                echo $form->labelEx($model_user, 'password_confirm');
                echo $form->passwordField($model_user, 'password_confirm', array(
                    'class' => 'span6 fieldrequire',
                    'placeholder' => MemUser::model()->getAttributeLabel('password_confirm'),
                ));
                echo $form->error($model_user, 'password_confirm');
                ?>
            </div>
            <!-- new line -->

            <div class="_100">
                <h4 class="reg">- <?php echo Yii::t('language', 'ข้อมูลส่วนตัว'); ?> -</h4>
            </div>
            <!-- คำน้หน้าชื่อ -->
            <div class="_20">
                <?php
                echo $form->labelEx($model, 'tname');
                echo $form->dropdownList($model, 'tname', TitleName::model()->getTitleNameThai(), array(
                    'class' => "span2 fieldrequire",
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('/site/TnameToEng'),
                        'update' => '#MemPerson_etname',
                        'data' => array('tname' => 'js:this.value')
                    )
                ));
                echo $form->error($model, 'tname');
                ?>
            </div>

            <!-- ชื่อไทย -->
            <div class="_40">
                <?php
                echo $form->labelEx($model, 'ftname');
                echo $form->textField($model, 'ftname', array(
                    'class' => 'span5 fieldrequire',
                    'placeholder' => MemPerson::model()->getAttributeLabel('ftname'),
                ));
                echo $form->error($model, 'ftname');
                ?>
            </div>

            <!-- นามสกุลไทย -->
            <div class="_40">
                <?php
                echo $form->labelEx($model, 'ltname');
                echo $form->textField($model, 'ltname', array(
                    'class' => 'span5 fieldrequire',
                    'placeholder' => MemPerson::model()->getAttributeLabel('ltname'),
                ));
                echo $form->error($model, 'ltname');
                ?>
            </div>
            <!-- new line -->

            <!-- คำนำหน้าภาษาอังกฤษ -->
            <div class="_20">
                <?php
                echo $form->labelEx($model, 'etname');
                echo $form->dropdownList($model, 'etname', TitleName::model()->getTitleNameEng(), array(
                    'class' => "span2",
                    'disabled' => 'disabled',
                ));
                echo $form->error($model, 'etname');
                ?>
            </div>

            <!-- name en -->
            <div class="_40">
                <?php
                echo $form->labelEx($model, 'fename');
                echo $form->textField($model, 'fename', array(
                    'class' => 'span5',
                    'placeholder' => MemPerson::model()->getAttributeLabel('fename'),
                ));
                echo $form->error($model, 'fename');
                ?>
            </div>

            <!-- lastname en -->
            <div class="_40">
                <?php
                echo $form->labelEx($model, 'lename');
                echo $form->textField($model, 'lename', array(
                    'class' => 'span5',
                    'placeholder' => MemPerson::model()->getAttributeLabel('lename'),
                ));
                echo $form->error($model, 'lename');
                ?>
            </div>
            <!-- new line -->

            <!-- เพศ -->
            <div class="_20">
                <p><?php echo $form->labelEx($model, 'sex'); ?></p>
                <?php
                echo $form->dropdownList($model, 'sex', MemSex::model()->getSex(), array(
                    'class' => "span2 fieldrequire",
                    'empty' => ' - ' . Yii::t('language', 'เลือก') . ' - '
                ));
                echo $form->error($model, 'sex');
                ?>
            </div>

            <!-- วันเกิด -->
            <div class="_40">
                <?php
                echo $form->labelEx($model, 'birth');
//                echo $form->textField($model, 'birth', array(
//                    'class' => 'date fieldrequire',
//                    'placeholder' => MemPerson::model()->getAttributeLabel('birth'),
//                ));
                echo $form->dropdownList($model, 'birth', Tool::getDropdownListYear(2500), array(
                    'class' => "date fieldrequire",
                    'empty' => 'เลือก'
                ));
                echo $form->error($model, 'birth');
                ?>
            </div>

            <!-- email -->
            <div class="_40">
                <?php
                echo $form->labelEx($model, 'email');
                echo $form->textField($model, 'email', array(
                    'class' => 'span5 fieldrequire',
                    'placeholder' => MemPerson::model()->getAttributeLabel('email'),
                ));
                echo $form->error($model, 'email');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'address');
                echo $form->textField($model, 'address', array(
                    'class' => 'span5 fieldrequire',
                    'placeholder' => MemPerson::model()->getAttributeLabel('address'),
                ));


                echo $form->error($model, 'address');
                ?>
            </div>
            <!-- new line -->

            <div class="_50">
                <span class="haft">
                    <?php
                    echo $form->labelEx($model, 'province');
                    ?>
                </span>
                <?php
                echo $form->dropdownList($model, 'province', Province::model()->getListProvince(), array(
                    'class' => "fieldrequire haft right",
                    'empty' => ' - ' . Yii::t('language', 'เลือก') . ' - ',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('/site/provinceToPrefecture'),
                        'update' => '#MemPerson_prefecture',
                        'data' => array('province' => 'js:this.value')
                    )
                ));
                echo $form->error($model, 'province');
                ?>
            </div>
            <div class="_50">
                <span class="haft">
                    <?php
                    echo $form->labelEx($model, 'prefecture');
                    ?>
                </span>
                <?php
                $list_prefecture = array();
                if ($model->prefecture != null) {
                    $field_prefecture = LanguageHelper::changeDB('name_th', 'name_en');
                    $list_prefecture = CHtml::listData(Prefecture::model()->findAll('province_id = :province_id', array(':province_id' => $model->province)), 'id', $field_prefecture);
                }
                echo $form->dropdownList($model, 'prefecture', $list_prefecture, array(
                    'class' => "fieldrequire haft right",
                    'empty' => ' - ' . Yii::t('language', 'เลือก') . ' - ',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('/site/PrefectureToDistrict'),
                        'update' => '#MemPerson_district',
                        'data' => array('prefecture' => 'js:this.value')
                    )
                ));
                echo $form->error($model, 'prefecture');
                ?>
            </div>


            <div class="_50">
                <span class="haft">
                    <?php
                    echo $form->labelEx($model, 'district');
                    ?>
                </span>
                <?php
                $list_district = array();
                if ($model->district != null) {
                    $field_district = LanguageHelper::changeDB('name_th', 'name_en');
                    $list_district = CHtml::listData(District::model()->findAll('prefecture_id = :prefecture_id', array(':prefecture_id' => $model->prefecture)), 'id', $field_district);
                }
                echo $form->dropdownList($model, 'district', $list_district, array(
                    'class' => "fieldrequire haft right",
                    'empty' => ' - ' . Yii::t('language', 'เลือก') . ' - ',
                ));
                echo $form->error($model, 'district');
                ?>
            </div>
            <div class="_50">
                <span class="haft"><?php echo $form->labelEx($model, 'postcode'); ?></span>


                <?php
                echo $form->textField($model, 'postcode', array(
                    'class' => 'right fieldrequire',
                    'placeholder' => MemPerson::model()->getAttributeLabel('postcode'),
                ));
                echo $form->error($model, 'postcode');
                ?>
            </div>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'mobile');
                echo $form->textField($model, 'mobile', array(
//                    'class' => 'fieldrequire ',
                    'placeholder' => MemPerson::model()->getAttributeLabel('mobile'),
                ));
                echo $form->error($model, 'mobile');
                ?>
            </div>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'tel');
                echo $form->textField($model, 'tel', array(
                    'placeholder' => MemPerson::model()->getAttributeLabel('tel'),
                ));
                echo $form->error($model, 'tel');
                ?>
            </div>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'fax');
                echo $form->textField($model, 'fax', array(
                    'placeholder' => MemPerson::model()->getAttributeLabel('fax'),
                ));
                echo $form->error($model, 'fax');
                ?>
            </div>


            <div class="_50">
                <?php echo $form->labelEx($model, 'high_education'); ?>

                <?php
                echo $form->dropDownList($model, 'high_education', HighEducation::model()->getListData(), array(
                    'empty' => ' - ' . Yii::t('language', 'เลือก') . ' - ',
                    'class' => ' right fieldrequire'
                ));
                echo $form->error($model, 'high_education');
                ?>
            </div>

            <div class="_100">
                <h4 class="reg">- <?php echo Yii::t('language', 'ข้อมูลธุรกิจ'); ?> -</h4>
            </div>
            <!-- ประเภทผู้สมัครสมาชิก -->
            <div class="_50 clearfix">
                <p>
                    <?php
                    echo $form->labelEx($model, 'mem_type');
                    ?>
                </p>


                <?php
                echo $form->radioButtonList($model, 'mem_type', array(
                    '1' => Yii::t('language', 'ผู้สนใจ'),
                    '2' => Yii::t('language', 'ผู้ประกอบธุรกิจ'
                    )), array(
                    'class' => 'fate',
                    'id' => 'member1'
                ));
                echo $form->error($model, 'mem_type');
                ?>
            </div>

            <div class="_50 clearfix">
                <!-- เลขทะเบียนพานิชย์ --> 
                <div id="clicked_2" class="hidden_destiny" >
                    <?php
                    echo $form->labelEx($model, 'panit');
                    echo $form->textField($model, 'panit');
                    echo $form->error($model, 'panit');
                    ?>
                </div>
            </div>

            <div class="_100"> <!-- clear ไม่ให้ขึ้นไปบรรทัดบน --> </div> 

            <div class="person">
                <div class="_25">
                    <?php echo $form->labelEx($model, 'product_name'); ?> 

                </div>
                <div class="_75">
                    <?php
                    echo $form->textField($model, 'product_name', array(
                        'id' => 'trurakitname',
                        // 'class' => 'haft',
                        'placeholder' => MemPerson::model()->getAttributeLabel('product_name')
                    ));
                    echo $form->error($model, 'product_name');
                    ?>
                </div>
                <div class="_25">
                    <?php echo $form->labelEx($model, 'product_name_en'); ?>

                </div>
                <div class="_75">
                    <?php
                    echo $form->textField($model, 'product_name_en', array(
                        'id' => 'trurakitname',
                        // 'class' => 'haft',
                        'placeholder' => MemPerson::model()->getAttributeLabel('product_name_en')
                    ));
                    echo $form->error($model, 'product_name_en');
                    ?>
                </div>

                <div class="_25">
                    <!-- <span class="haft"> -->
                    <?php echo $form->labelEx($model, 'business_type'); ?>
                    <!-- </span> -->
                </div>
                <div class="_75">
                    <?php
                    echo $form->dropDownList($model, 'business_type', CompanyTypeBusiness::model()->getListData(), array(
                        'empty' => ' - ' . Yii::t('language', 'เลือก') . ' - ',
                            // 'class' => 'haft'
                    ));
                    echo $form->error($model, 'business_type');
                    ?>
                </div>
            </div>
            <div class="_100"></div> 
            <?php if (CCaptcha::checkRequirements()) { ?>
                <div class="_25"> 
                    <!-- <span class="haft"> -->
                    <?php echo $form->labelEx($model_user, 'verifyCode'); ?>
                    <!-- </span> -->
                </div>

                <div class="capcha _33">
                    <?php
                    $this->widget('CCaptcha');
                    echo $form->textField($model_user, 'verifyCode', array('class' => 'fieldrequire'));
                    echo $form->error($model_user, 'verifyCode');
                    ?>
                </div>

            <?php } ?>

            <div class="_100 textcenter padud20">
                <?php
                echo CHtml::submitButton(Yii::t('language', 'สมัครสมาชิก'));
                echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/site/index'
                    )) . "'")
                );
                ?>

            </div> 
            <?php $this->endWidget(); ?>

        </div>
    </div>
</div>


