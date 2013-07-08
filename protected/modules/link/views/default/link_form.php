<div class="content_front" class="clearfix">
    <?php
//    $this->widget('ext.EChosen.EChosen');
    $name_btn = "เพิ่ม";
    if ($model->id != '') {
        $name_btn = "แก้ไข";
//        $model_files_old = DlFiles::model()->findAll("news_id=" . $model->id);
    }
    ?>
    <h3 class="barH3">
<!--        <span style='padding:0 20px'>
        <?php
        $hh = Yii::t('language', 'เว็บไซต์ที่เกี่ยวข้อง') . ' -> ' . Yii::t('language', 'จัดการเว็บไซต์ที่เกี่ยวข้อง');
        $hh .= ' -> ';
        $hh2 = Yii::t('language', $name_btn) . Yii::t('language', 'เว็บไซต์ที่เกี่ยวข้อง');
        echo $hh . $hh2;
        ?>
        </span>-->
        <span>
            <?php
            echo Yii::t('language', $name_btn) . ' ' . Yii::t('language', 'เว็บไซต์ที่เกี่ยวข้อง');
            ?>
        </span>
    </h3>
    <div class="bucketLeft clearfix">
        <!--        <div class="clearfix">
                    <h2 class="ribbin">
        <?php echo $hh2; ?>
                    </h2>
                </div>-->
        <div class="areaWhite clearfix">
            <div class="group">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'link-form',
                    'enableClientValidation' => false,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                    ),
                        ));
                echo $form->errorSummary($model);
                ?>

                <div class="rowContact clearfix">
                    <?php
                    echo Yii::t('language', $form->labelEx($model, 'name'));
                    echo $form->textField($model, 'name', array('size' => '90'));
//                    echo Yii::t('language', $form->error($model, 'name'));
                    ?>
                </div>
                <div class="rowContact clearfix">
                    <?php
                    echo Yii::t('language', $form->labelEx($model, 'group_id'));
                    echo $form->dropDownList($model, 'group_id', CHtml::listData(LinkGroup::model()->findAll(), 'id', 'name'), array('empty'=>'กรุณาเลือกกลุ่ม'));
//                    echo Yii::t('language', $form->error($model, 'group_id'));
                    ?>
                </div>
                <div class="rowContact clearfix">
                    <?php
                    echo Yii::t('language', $form->labelEx($model, 'link'));
                    echo $form->textField($model, 'link', array('size' => '255'));
//                    echo Yii::t('language', $form->error($model, 'link'));
                    ?>
                </div>
                <div class="rowContact clearfix">
                    <?php
                    echo $form->labelEx($model, 'img_path');
//                    echo "<label>" . Yii::t('language', 'แนบไฟล์') . "</label>";
                    $this->widget('CMultiFileUpload', array(
                        'model' => $model,
                        'attribute' => 'img_path',
                        'name' => 'link_file',
                        'accept' => 'jpg|jpeg|gif|png',
                        'denied' => Yii::t('language', 'allowed_img'),
                        'max' => 1,
                        'remove' => '[x]',
                        'duplicate' => Yii::t('language', 'Already Selected'),
                            )
                    );
//                    echo Yii::t('language', $form->error($model, 'img_path'));
                    ?>
                    <div>
                        <div class="file_old clearfix">                                       
                            <?php
                            echo "<ul class='list_files'> ";
                            $arr_file_detail = explode('.', $model->img_path);

                            $arr_file_name = explode('/upload/link/', $model->img_path);
                            echo "<li class='link_img'>" . CHtml::link($arr_file_name[1], $model->img_path, array('target' => '_blank')) . "</li>";
                            echo " </ul>";
                            ?>
                            </ul>
                        </div>
                        <div class="descAttach">
                            <?php echo Yii::t('language', 'ไฟล์แนบ') . Yii::t('language', 'ได้แก่'); ?> .jpg, .jpeg, .png, .gif
                            <?php echo '(' . Yii::t('language', 'ขนาดไม่เกิน') . ' 10 MB)' . Yii::t('language', 'ชื่อไฟล์เป็นภาษาอังกฤษเท่านั้น'); ?>
                        </div>
                        <?php //echo Yii::t('language', $form->error($model_files, 'file_name')); ?>
                    </div>
                </div>
                <div class="btnForm">
                    <?php
                    echo CHtml::hiddenField('img_path', $model->img_path);
                    echo CHtml::hiddenField('author', $model->author);
                    echo CHtml::hiddenField('date_write', $model->date_write);
                    
                    echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                        'onclick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/link/default/managelink'
                        )) . "'"
                        , 'confirm' => Yii::t('language', 'คุณต้องการย้อนกลับหรือไม่?'))
                    );
                    ?>
                </div>
                <!--</div>-->
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
