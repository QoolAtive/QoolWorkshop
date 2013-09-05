<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li>
                <a href="/knowledge/default/index" rel="view-1">
                    <?php echo Yii::t('language', 'บทความ'); ?>
                </a>
            </li>
            <li>
                <a href="/learning/default/home"  rel="view-2">
                    <?php echo Yii::t('language', 'การเรียนรู้'); ?>
                </a>
            </li>
            <li class="selected">
                <a href="/knowledge/manage/knowledge" rel="manage-1">
                    <?php echo Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'บทความ'); ?>
                </a>
            </li>
            <li>
                <a href="/learning/manage/learning" rel="manage-2">
                    <?php echo Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'การเรียนรู้'); ?>
                </a>
            </li>

            <?php
//            $list = array(
//                array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '/knowledge/manage/knowledge', 'select' => 'selected'),
////                array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '/knowledge/manage/knowledgeAll', 'select' => ''),
//            );
//            echo Tool::GenList($list);
            ?> 

        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <?php
        if ($model->knowledge_type_id == NULL) {
            $word = 'เพิ่ม';
        } else {
            $word = 'แก้ไข';
        }
        ?>
        <h3 class="barH3">
            <span>
                <i class='icon-lightbulb'></i>                
                <a href="<?php echo CHtml::normalizeUrl(array("/knowledge/default/knowledge")); ?>">
                    <?php echo Yii::t('language', 'บทความทั้งหมด'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/knowledge/manage/knowledge")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'บทความ'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . trim(Yii::t('language', 'บทความ')); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'knowledge_type_insert-form',
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>
        <div class="_100">
            <h4 class="reg"><?php echo "- " . Yii::t('language', 'ประเภทภาษาไทย') . " -"; ?></h4>
        </div>
        <div class="_100">
            <div class="ckleft">
                <?php
                echo $form->labelEx($model, 'name_th');
                ?>

            </div>
            <div class="ckright">
                <?php
                echo $form->textField($model, 'name_th');
                echo $form->error($model, 'name_th')
                ?>
            </div>
        </div>
        <div class="_100">
            <h4 class="reg"><?php echo "- " . Yii::t('language', 'ประเภทภาษาอังฤกษ') . " -"; ?></h4>
        </div>


        <div class="_100">
            <div class="ckleft">
                <?php echo $form->labelEx($model, 'name_en'); ?>
            </div>

            <div class="ckright">
                <?php
                echo $form->textField($model, 'name_en');
                echo $form->error($model, 'name_en')
                ?>
            </div>
        </div>
        <div class="txt-cen">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onClick' => "history.go(-1)")
            );
            ?>
            <hr>
        </div>
        <?php $this->endWidget(); ?>

    </div>
</div>