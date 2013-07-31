<script type="text/javascript" >
    //Assign to those input elements that have 'placeholder' attribute
    $('input[placeholder]').each(function() {
        var input = $(this);
        $(input).val(input.attr('placeholder'));

        $(input).focus(function() {
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        });

        $(input).blur(function() {
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
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
                array('text' => 'บุคคลธรรมดา', 'link' => '/member/manage/registerPerson', 'select' => 'selected'),
                array('text' => 'นิติบุคคล', 'link' => '/member/manage/registerRegistration'),
            );
            echo Tool::GenList($list);
            ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <div class="row-fluid">
                <h3> <img src="/img/iconform.png"> แบบลงทะเบียนบุคลธรรมดา </h3>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'insert-form',
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                ));
                ?>
                <ul class="form">
                    <li>
                        <?php
                        echo $form->labelEx($model, 'username');
                        echo $form->textField($model, 'username', array(
                            'class' => 'span12 fieldrequire',
                            'placeholder' => MemPerson::model()->getAttributeLabel('username'),
                        ));
                        echo $form->error($model, 'username');
                        ?>
                    </li>
                    <li> 
                        <?php
                        echo $form->labelEx($model, 'password');
                        echo $form->passwordField($model, 'password', array(
                            'class' => 'span6 fieldrequire',
                            'placeholder' => MemPerson::model()->getAttributeLabel('password'),
                        ));
                        echo $form->error($model, 'password');
                        ?>
                        <?php
                        echo $form->labelEx($model, 'confirm_password');
                        echo $form->passwordField($model, 'confirm_password', array(
                            'class' => 'span6 fieldrequire',
                            'placeholder' => MemPerson::model()->getAttributeLabel('confirm_password'),
                        ));
                        echo $form->error($model, 'confirm_password');
                        ?>
                    </li>
                    <li>
                        <p><?php echo $form->labelEx($model, 'mem_type'); ?></p>
                        <span class="span1">
                            <?php
                            echo $form->radioButton($model, 'mem_type', array(
                                'value' => '1',
                                'id' => 'member1',
                            )) . ' ผู้สนใจ';
                            ?>
                        </span>
                        <span class="span2">
                            <?php
                            echo $form->radioButton($model, 'mem_type', array(
                                'value' => '2',
                                'id' => 'member1',
                            )) . '  ผู้ประกอบธุรกิจ';
                            ?>
                        </span>
                        <?php
                        echo $form->error($model, 'mem_type');

                        echo $form->labelEx($model, 'panit');
                        echo $form->textField($model, 'panit', array(
                            'class' => ' span9 panit',
                            'placeholder' => 'เลขทะเบียนพาณิชย์ แสดงเมื่อเลือก ผู้ประกอบธุรกิจ',
                            'id' => 'panit',
                            'name' => 'panit',
                            'style' => 'float: right !important;',
                        ));
                        echo $form->error($model, 'panit');
                        ?> 
                    </li>
                    <div style="clear:both;"></div>
                    <li>
                        <p>ข้อมูลส่วนตัว</p>
                        <?php
                        echo $form->labelEx($model, 'tname');
                        echo $form->dropdownList($model, 'tname', TitleName::model()->getTitleName('th'), array(
                            'name' => "Prefix",
                            'class' => "span2",
                        ));
                        echo $form->error($model, 'tname');

                        echo $form->labelEx($model, 'ftname');
                        echo $form->textField($model, 'ftname', array(
                            'class' => 'span5',
                            'placeholder' => MemPerson::model()->getAttributeLabel('ftname'),
                        ));
                        echo $form->error($model, 'ftname');

                        echo $form->labelEx($model, 'ltname');
                        echo $form->textField($model, 'ltname', array(
                            'class' => 'span5',
                            'placeholder' => MemPerson::model()->getAttributeLabel('ltname'),
                        ));
                        echo $form->error($model, 'ltname');

                        echo $form->labelEx($model, 'etname');
                        echo $form->dropdownList($model, 'etname', TitleName::model()->getTitleName('en'), array(
                            'name' => "Prefix",
                            'class' => "span2",
                        ));
                        echo $form->error($model, 'etname');

                        echo $form->labelEx($model, 'fename');
                        echo $form->textField($model, 'fename', array(
                            'class' => 'span5',
                            'placeholder' => MemPerson::model()->getAttributeLabel('fename'),
                        ));
                        echo $form->error($model, 'fename');

                        echo $form->labelEx($model, 'lename');
                        echo $form->textField($model, 'lename', array(
                            'class' => 'span5',
                            'placeholder' => MemPerson::model()->getAttributeLabel('lename'),
                        ));
                        echo $form->error($model, 'lename');
                        ?>
                    </li>
                    <li>
                        <p><?php echo $form->labelEx($model, 'sex'); ?></p>
                        <?php
                        echo $form->dropdownList($model, 'sex', MemSex::model()->getSex(), array(
                            'class' => "span2",
//                            'empty' => 'เลือก'
                        ));
                        echo $form->error($model, 'sex');
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $form->labelEx($model, 'birth');
                        echo $form->textField($model, 'birth', array(
                            'class' => 'date',
                            'placeholder' => MemPerson::model()->getAttributeLabel('birth'),
                        ));
                        echo $form->error($model, 'birth');

                        echo $form->labelEx($model, 'email');
                        echo $form->textField($model, 'email', array(
//                            'class' => 'span5',
                            'placeholder' => MemPerson::model()->getAttributeLabel('email'),
                        ));
                        echo $form->error($model, 'email');
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $form->labelEx($model, 'province');
                        echo $form->dropdownList($model, 'province', Province::model()->getListProvince(), array(
                            'class' => "span2",
                            'empty' => 'เลือก',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('/site/provinceToPrefecture'),
                                'update' => '#MemPerson_prefecture',
                                'data' => array('province' => 'js:this.value')
                            )
                        ));
                        echo $form->error($model, 'province');

                        echo $form->labelEx($model, 'prefecture');
                        echo $form->dropdownList($model, 'prefecture', array(), array(
                            'class' => "span2",
                            'empty' => 'เลือก',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('/site/PrefectureToDistrict'),
                                'update' => '#MemPerson_district',
                                'data' => array('prefecture' => 'js:this.value')
                            )
                        ));
                        echo $form->error($model, 'prefecture');

                        echo $form->labelEx($model, 'district');
                        echo $form->dropdownList($model, 'district', array(), array(
                            'class' => "span2",
                            'empty' => 'เลือก',
                        ));
                        echo $form->error($model, 'district');

                        echo $form->labelEx($model, 'postcode');
                        echo $form->textField($model, 'postcode', array(
                            'class' => 'span5',
                            'placeholder' => MemPerson::model()->getAttributeLabel('postcode'),
                        ));
                        echo $form->error($model, 'postcode');
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $form->labelEx($model, 'mobile');
                        echo $form->textField($model, 'mobile', array(
                            'class' => 'span5',
                            'placeholder' => MemPerson::model()->getAttributeLabel('mobile'),
                        ));
                        echo $form->error($model, 'mobile');

                        echo $form->labelEx($model, 'tel');
                        echo $form->textField($model, 'tel', array(
                            'class' => 'span5',
                            'placeholder' => MemPerson::model()->getAttributeLabel('tel'),
                        ));
                        echo $form->error($model, 'tel');

                        echo $form->labelEx($model, 'fax');
                        echo $form->textField($model, 'fax', array(
                            'class' => 'span5',
                            'placeholder' => MemPerson::model()->getAttributeLabel('fax'),
                        ));
                        echo $form->error($model, 'fax');
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $form->labelEx($model, 'high_education');
                        echo $form->dropDownList($model, 'high_education', HighEducation::model()->getListData(), array(
                            'empty' => 'เลือก'
                        ));
                        echo $form->error($model, 'high_education');

                        echo $form->labelEx($model, 'career');
                        echo $form->dropDownList($model, 'career', Career::model()->getListData(), array(
                            'empty' => 'เลือก'
                        ));
                        echo $form->error($model, 'career');
                        ?>
                    </li>
<!--                    <li>
                        <?php
//                        echo $form->labelEx($model, 'skill_com');
//                        echo $form->dropDownList($model, 'skill_com', MemSkillCom::model()->getListData(), array(
//                            'empty' => 'เลือก'
//                        ));
//                        echo $form->error($model, 'skill_com');
                        ?>
                    </li>-->
                    <li>
                        <?php
                        echo CHtml::submitButton('สมัครสมาชิก');
                        ?>
                    </li>
                </ul>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>


