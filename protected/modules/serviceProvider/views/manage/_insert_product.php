<?php
$this->renderPartial('_side_bar', array(
    'select1' => '',
    'select2' => '',
    'select3' => 'selected',
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        if (empty($model->id)) {
            $btnText = 'บันทึก';

            $link_back = '/serviceProvider/manage/typeBusiness';
        } else {
            $btnText = 'บันทึก';

            $link_back = '/serviceProvider/manage/typeBusiness';
        }
        ?>
        <h3>  <i class="icon-plus"></i> <?php echo Yii::t('language', 'สินค้าและบริการ'); ?></h3>

        <hr>
        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'insert_type_business-form',
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>
            <div class="_100">
                <div class="ckleft"> 
                    <?php echo CHtml::label(Yii::t('language', 'รูปภาพเดิม'), false); ?>
                </div>
                <div class="ckright">
                    <?php
                    if (!empty($model->image)) {
                        ?>
                        <?php
                        echo CHtml::image("/file/product/" . $model->image, "image", array('height' => '100'));
                        echo $model->image;
                        ?>

                        <?php
                    }
                    ?> 
                </div>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'image');
                echo $form->fileField($model, 'image');
                echo $form->error($model, 'image');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'guide');
                echo $form->radioButtonList($model, 'guide', SpProduct::model()->getDataTypeList('', true));
                echo $form->error($model, 'guide');
                ?>
            </div>
            <div class="_100">
                <h4 class="reg"><?php echo Yii::t('language', '- ข้อมูลสินค้าภาษาไทย -'); ?></h4>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'name');
                echo $form->textfield($model, 'name');
                echo $form->error($model, 'name');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'detail');
                echo $form->textArea($model, 'detail');
                echo $form->error($model, 'detail');
                ?>
            </div>
            <div class="_100">
                <h4 class="reg"><?php echo Yii::t('language', '- ข้อมูลสินค้าภาษาอังกฤษ -'); ?></h4>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'name_en');
                echo $form->textfield($model, 'name_en');
                echo $form->error($model, 'name_en');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'detail_en');
                echo $form->textArea($model, 'detail_en');
                echo $form->error($model, 'detail_en');
                ?>
            </div>
            <div class="_100 textcenter">
                <?php
                echo CHtml::submitButton($btnText);
//        echo CHtml::button('ยกเลิก', array('onClick' => "history.go(-1)")
//        );
//        echo Yii::app()->user->getState('product_link_back_to_menu');
                if (Yii::app()->user->getState('default_link_back_to_menu') != null) {
                    $link_back = Yii::app()->user->getState('default_link_back_to_menu');
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            $link_back
                        )) . "'")
                    );
                } else {
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/serviceProvider/manage/product/id/' . $id
                        )) . "'")
                    );
                }
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>