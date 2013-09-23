<?php
$this->renderPartial('_menu', array('select' => 3));
?>
<div class="content">
    <div class="tabcontents">
        <div class="sitemap">

            <img class="pagebanner" alt="pagebanner" src="/img/banner/about.png">
            <h2 class="textcenter"><strong><?php echo Yii::t('language', 'แผนที่เว็บไซต์'); ?>DBD Mart</strong></h2>
            <?php
            foreach ($modelSiteMapMain as $main) {
                ?>
                <p>
                    <?php
                    $main_name = LanguageHelper::changeDB($main->name, $main->name_en);
                    echo CHtml::link($main_name, array($main->link), array('target' => '_bank'));
                    ?>
                </p>
                <?php
                $cSub = new CDbCriteria();
//                $cSub->condition = 'main_id = :main_id and sub_id is null';
                $cSub->condition = 'main_id = :main_id';
                $cSub->params = array(':main_id' => $main->site_map_id);
                $cSub->order = 'sort asc, id_code asc';
                $modelSiteMapSub = SiteMapSub::model()->findAll($cSub);
                if (count($modelSiteMapSub) > 0) {
                    ?>
                    <ul>
                        <?php
                        foreach ($modelSiteMapSub as $sub) {
                            ?>
                            <li>
                                <?php
                                $sub_name = LanguageHelper::changeDB($sub->name, $sub->name_en);
                                echo CHtml::link($sub_name, array($sub->link), array('target' => '_bank'));
                                ?>
                            </li>
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