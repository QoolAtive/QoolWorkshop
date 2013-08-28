<style type="text/css">
    .ui-state-default{
        background: #eee;
    }
    .ui-tabs-active ,.ui-state-active {
        background: #fff;
    }

    .ui-tabs .ui-tabs-nav {
        margin-left: -3px;
    }
    .ui-widget-header {
        background: transparent;
        border: 0px ;
        border-radius: 0px;
        border-bottom: 1px solid #aaa;
    }
    .ui-widget-content{
        border: 0px;
    }
</style>
<?php
$this->renderPartial('side_bar', array(
    'active' => 1,
))
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
                <?php echo Yii::t('language', 'ร้านค้าทั้งหมด'); ?>
            </span>
        </h3>
        <hr>
        <div class='textcenter'>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ร้านค้า'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/insertCompany'
                )) . "'")
            );
            echo CHtml::button(Yii::t('language', 'อัพโหลด') . Yii::t('language', 'ร้านค้า'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/companyUpload'
                )) . "'")
            );
            ?>
        </div>
        <hr>
        <?php
        $tabs = array();
        $tabs[Yii::t('language', 'ร้านค้าโดยผู้ดูแลระบบ')] = $this->renderPartial('company_grid_admin', array(
            'dataProvider' => $dataProviderAdmin,
            'model' => $modelAdmin,
                ), true, false);

        $tabs[Yii::t('language', 'ร้านค้าโดยสมาชิก')] = $this->renderPartial('company_grid_user', array(
            'dataProvider' => $dataProviderUser,
            'model' => $modelUser,
                ), true, false);

//        $tabs[Yii::t('language', 'ร้านค้าโดยผู้ดูแลระบบ')] = array(
//            'id' => 'tab-01',
//            'content' => $this->renderPartial('company_grid_admin', array(
//                'dataProvider' => $dataProviderAdmin,
//                'model' => $modelAdmin,
//                    ), true, false),
//        );
//
//        $tabs[Yii::t('language', 'ร้านค้าโดยสมาชิก')] = array(
//            'id' => 'tab-02',
//            'content' => $this->renderPartial('company_grid_user', array(
//                'dataProvider' => $dataProviderUser,
//                'model' => $modelUser,
//                    ), true, false),
//        );

        $this->widget('zii.widgets.jui.CJuiTabs', array(
            'tabs' => $tabs,
            'options' => array(
//                'collapsible' => true,//พับได้
                'collapsible' => false,
            ),
            'id' => 'tab_all_shop',
        ));
        ?>
<!--        <h3><?php //echo Yii::t('language', 'ร้านค้าโดยผู้ดูแลระบบ');       ?></h3>
        <?php
//        $this->renderPartial('company_grid_admin', array(
//            'dataProvider' => $dataProviderAdmin,
//            'model' => $modelAdmin,
//        ));
        ?>
        <hr>
        <h3><?php //echo Yii::t('language', 'ร้านค้าโดยสมาชิก');        ?></h3>
        <?php
//        $this->renderPartial('company_grid_user', array(
//            'dataProvider' => $dataProviderUser,
//            'model' => $modelUser,
//        ));
        ?>
        -->
    </div>
</div>
