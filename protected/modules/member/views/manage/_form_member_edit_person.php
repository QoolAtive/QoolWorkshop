<div class="content" style="padding: 0% 11.5%;">
    <div class="row-fluid">
        <h3> <img src="/img/iconform.png"> แก้ไขข้อมูลบุคคลธรรมดา </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="_100">
            <h4 class="reg">- ข้อมูลส่วนตัว -</h4>
        </div>
        <!-- คำน้หน้าชื่อ -->
        <div class="_20">
            <?php
            echo $form->labelEx($model, 'tname');
            echo $form->dropdownList($model, 'tname', TitleName::model()->getTitleName('th'), array(
//                            'name' => "Prefix",
                'class' => "span2",
            ));
            echo $form->error($model, 'tname');
            ?>
        </div>
        <!-- ชื่อไทย -->
        <div class="_40">
            <?php
            echo $form->labelEx($model, 'ftname');
            echo $form->textField($model, 'ftname', array(
                'class' => 'span5',
                    // // 'placeholder' => MemPerson::model()->getAttributeLabel('ftname'),
            ));
            echo $form->error($model, 'ftname');
            ?>
        </div>
        <!-- นามสกุลไทย -->
        <div class="_40">
            <?php
            echo $form->labelEx($model, 'ltname');
            echo $form->textField($model, 'ltname', array(
                'class' => 'span5',
                    // // 'placeholder' => MemPerson::model()->getAttributeLabel('ltname'),
            ));
            echo $form->error($model, 'ltname');
            ?>
        </div>
        <!-- new line -->
        <div class="_100"></div>
        <!-- คำนำหน้าภาษาอังกฤษ -->
        <div class="_20">
            <?php
            echo $form->labelEx($model, 'etname');
//                        echo "คำนำหน้าภาษาอังกฤษ";
            echo $form->dropdownList($model, 'etname', TitleName::model()->getTitleName('en'), array(
//                            'name' => "Prefix",
                'class' => "span2",
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
                    // 'placeholder' => MemPerson::model()->getAttributeLabel('fename'),
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
                    // 'placeholder' => MemPerson::model()->getAttributeLabel('lename'),
            ));
            echo $form->error($model, 'lename');
            ?>
        </div>
        <!-- new line -->
        <div class="_100"></div>
        <!-- เพศ -->
        <div class="_20">
            <p><?php echo $form->labelEx($model, 'sex'); ?></p>
            <?php
            echo $form->dropdownList($model, 'sex', MemSex::model()->getSex(), array(
                'class' => "span2",
//                            'empty' => 'เลือก'
            ));
            echo $form->error($model, 'sex');
            ?>
        </div>
        <!-- วันเกิด -->
        <div class="_40">
            <?php
            echo $form->labelEx($model, 'birth');
            echo $form->textField($model, 'birth', array(
                'class' => 'date',
                    // 'placeholder' => MemPerson::model()->getAttributeLabel('birth'),
            ));
            echo $form->error($model, 'birth');
            ?>
        </div>
        <!-- email -->
        <div class="_40">
            <?php
            echo $form->labelEx($model, 'email');
            echo $form->textField($model, 'email', array(
//                            'class' => 'span5',
                    // 'placeholder' => MemPerson::model()->getAttributeLabel('email'),
            ));
            echo $form->error($model, 'email');
            ?>
        </div>
        <div class="_33">
            <?php
            echo $form->labelEx($model, 'mobile');
            echo $form->textField($model, 'mobile', array(
                'class' => 'span5',
                    // 'placeholder' => MemPerson::model()->getAttributeLabel('mobile'),
            ));
            echo $form->error($model, 'mobile');
            ?>
        </div>
        <div class="_33">
            <?php
            echo $form->labelEx($model, 'tel');
            echo $form->textField($model, 'tel', array(
                'class' => 'span5',
                    // 'placeholder' => MemPerson::model()->getAttributeLabel('tel'),
            ));
            echo $form->error($model, 'tel');
            ?>
        </div>
        <div class="_33">
            <?php
            echo $form->labelEx($model, 'fax');
            echo $form->textField($model, 'fax', array(
                'class' => 'span5',
                    // 'placeholder' => MemPerson::model()->getAttributeLabel('fax'),
            ));
            echo $form->error($model, 'fax');
            ?>
        </div>
        <div class="_33">
            <?php
            echo $form->labelEx($model, 'high_education');
            echo $form->dropDownList($model, 'high_education', HighEducation::model()->getListData(), array(
                'empty' => 'เลือก'
            ));
            echo $form->error($model, 'high_education');
            ?>
        </div>

        <div class="_100">
            <h4 class="reg">- ข้อมูลธุรกิจ -</h4>
        </div>
        <!-- ประเภทผู้สมัครสมาชิก -->
        <div class="_50 clearfix">
            <p>
                <?php
                echo $form->labelEx($model, 'mem_type');
                ?>
            </p>
            <span class="span1">
                <?php
                echo $form->radioButtonList($model, 'mem_type', array('1' => 'ผู้สนใจ', '2' => 'ผู้ประกอบธุรกิจ'), array('class' => 'fate', 'id' => 'member1'));
                echo $form->error($model, 'mem_type');
                ?>
            </span>
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
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'business_type');
            echo $form->dropDownList($model, 'business_type', CompanyTypeBusiness::model()->getListData(), array(
                'empty' => 'เลือก'
            ));
            echo $form->error($model, 'business_type');
            ?>
        </div>

        <div class="_50">
            <?php
            echo $form->labelEx($model, 'product_name');
            echo $form->textField($model, 'product_name');
            echo $form->error($model, 'product_name');
            ?>
        </div>
        <div class="_100"></div>
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'product_name');
            echo $form->textField($model, 'product_name');
            echo $form->error($model, 'product_name');
            ?>
        </div>
        <div class="_100"></div>
        <div class="_100 textcen">
            <?php
            echo CHtml::submitButton('สมัครสมาชิก');
            ?>
        </div> 
        <?php $this->endWidget(); ?>
    </div>
</div>


