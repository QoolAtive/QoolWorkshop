<style type="text/css">
    .sitemap > p {
        margin-left: 50px;
        font-size: 14px;
        font-weight: bold;
        margin-top: 14px;
    }
    .sitemap ul li{
        text-indent: 85px;
    }
</style>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/about.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li class="<?php echo $select1; ?>">
                <?php
                echo CHtml::link(Yii::t('language', 'เกี่ยวกับเรา'), CHtml::normalizeUrl(
                                array('/about/default/index/view/1')
                        ), array('rel' => 'view1')
                );
                ?>
            </li>
            <li class="<?php echo $select2; ?>">
                <?php
                echo CHtml::link(
                        Yii::t('language', 'ติดต่อเรา'), CHtml::normalizeUrl(
                                array('/about/default/index/view/2')
                        ), array('rel' => 'view2')
                );
                ?>
            </li>
            <li class="<?php echo $select3; ?>">
                <?php
                echo CHtml::link(
                        Yii::t('language', 'Sitemap'), CHtml::normalizeUrl(
                                array('/about/default/index/view/3')
                        ), array('rel' => 'view3')
                );
                ?>
            </li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                ?>
                <li>
                    <?php
                    echo CHtml::link(
                            Yii::t('language', 'จัดการ') . "<br/>" . Yii::t('language', 'เกี่ยวกับเรา'), CHtml::normalizeUrl(
                                    array('/about/default/editAbout')
                            ), array('rel' => 'view3')
                    );
                    ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div class="sitemap">
            <h2 class="textcenter"><strong>แผนผังเว็บไซต์ DBD Mart</strong></h2>
            <?php
            foreach ($modelSiteMapMain as $main) {
                ?>
                <p><?php echo CHtml::link($main->name, array($main->link), array('target' => '_bank')); ?></p>
                <?php
                $cSub = new CDbCriteria();
                $cSub->condition = 'main_id = :main_id and sub_id is null';
                $cSub->params = array(':main_id' => $main->site_map_id);
                $cSub->order = 'sort asc, id_code asc';
                $modelSiteMapSub = SiteMapSub::model()->findAll($cSub);
                if (count($modelSiteMapSub) > 0) {
                    ?>
                    <ul>
                        <?php
                        foreach ($modelSiteMapSub as $sub) {
                            ?>
                            <li><?php echo CHtml::link($sub->name, array($sub->link), array('target' => '_bank')); ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>