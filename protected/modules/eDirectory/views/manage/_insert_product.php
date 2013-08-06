<?php
$list = array(
    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '/eDirectory/manage/index', 'select' => ''),
    array('text' => Yii::t('language', 'จัดการสินค้าและบริการ'), 'link' => '/eDirectory/manage/product', 'select' => ''),
    array('text' => Yii::t('language', 'เพิ่มข้อมูลสินค้าและบริการ'), 'link' => '#', 'select' => 'selected'),
);
$this->renderPartial('side_bar', array(
    'list' => $list,
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
                    if (!empty($model->pic)) {
                        ?>
                        <?php
                        echo CHtml::image("/file/product/" . $model->pic, "image", array('height' => '100'));
                        echo $model->pic;
                        ?>

                        <?php
                    }
                    ?> 
                </div>
            </div>
            <div class="_100">
                <?php
                echo $form->label($model, 'pic');
                echo $form->fileField($model, 'pic');
                echo $form->error($model, 'pic');
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
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>