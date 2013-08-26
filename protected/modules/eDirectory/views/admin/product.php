<?php
$this->renderPartial('side_bar', array(
    'active' => 5,
    'company_id' => $id,
));
$title = Company::model()->find('id=:id', array(':id' => $id));
$company_name = LanguageHelper::changeDB($title->name, $title->name_en);
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-home"></i>
                <?php
                echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'), array('/eDirectory/admin/index'));
                ?>
                <i class="icon-chevron-right"></i>
                <?php echo CHtml::link(Yii::t('language', 'ร้านค้าทั้งหมด'), array('/eDirectory/admin/index')); ?>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าและบริการ') . ' (' . $company_name . ') '; ?>
            </span>
        </h3>
        <div class="textcenter">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ข้อมูลสินค้า'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/insertProduct/id/' . $id // id = id บริษัท
                )) . "'")
            );
            echo CHtml::button(Yii::t('language', 'อัพโหลด') . Yii::t('language', 'สินค้า'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/companyProductUpload/company_id/' . $id // id = id บริษัท
                )) . "'")
            );
            ?>
            <hr>
        </div>
        <div>
            <?php
            $this->renderPartial('product_grid', array(
                'dataProvider' => $dataProvider,
                'model' => $model,
            ));
            ?>
        </div>
        <div class="_100 textcenter">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/index'
                )) . "'")
            );
            ?>
            <hr>
        </div>
    </div>
</div>
