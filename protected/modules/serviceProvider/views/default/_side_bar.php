<style>
    .rectangle-list ul.sub
    {
        padding-left:20px; /*This determines the hierarchical offset*/ 
    }
</style>
<div class="sidebar">
    <div class="menuitem">
        <ul>                               
            <li class="boxhead" style="background-size: 225px; background: url('<?php echo Yii::t('language', '/img/iconpage/serviceprovider.png'); ?>');" ></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'ผู้ให้บริการ'), array(
                    '/serviceProvider/manage/typeBusiness'), array('rel' => 'view1'));
                echo "</li>";
            }
//            $menu = SpTypeBusiness::model()->findAll();
//            $select = '';
//            $n = 3;
//            foreach ($menu as $m) {
//                if ($id == $m['id']) {
//                    $select = 'selected';
//                }
//                $name = LanguageHelper::changeDB($m['name'], $m['name_en']);
//                echo "<li class='" . $select . "' >";
//                echo CHtml::link($name, array(
//                    '/serviceProvider/default/partnerGroup/', 'id' => $m['id']), array(
//                    'rel' => 'view' . $n++));
//                echo "</li>";
//            }
//            
            ?>
        </ul>
        <div class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
             border-top: 2px solid gold;
             font-size: 16px;
             margin-top: 6px;
             padding: 14px 0;">
            <p style="font-weight: bold;">
                <?php
                echo Yii::t('language', 'ประเภทผู้ให้บริการ');
                ?>
            </p>
        </div>
        <ul class="rectangle-list">
            <p class="demoline"></p>
            <?php
            $list_sub = '';
            $active = false;
            $menu = SpTypeBusiness::model()->findAll();

            foreach ($menu as $m) {
                $c = new CDbCriteria();
                $c->order = 'sp_type_business_sub_id desc';
                $c->condition = 'sp_type_business = :sp_type_business';
                $c->params = array(':sp_type_business' => $m->id);
                $menu_sub = SpTypeBusinessSub::model()->findAll($c);
                $select = '';
                if ($id == $m['id']) {
                    $active = true;
                    $select = 'menuactive listactive';
                }
                $name = LanguageHelper::changeDB($m['name'], $m['name_en']);
                $list_sub .= "<li>";
                $list_sub .= CHtml::link($name, array(
                            '/serviceProvider/default/partnerGroup/', 'id' => $m['id']), array(
                            'rel' => 'view' . $n++,
                            'class' => $select
                ));
                if (count($menu_sub) > 0) {
                    $list_sub .= '<ul class="sub">';
                    foreach ($menu_sub as $ms) {
                        if ($_GET['sp_type_business_sub_id'] == $ms['sp_type_business_sub_id'] && $_GET['id'] == $ms['sp_type_business']) {
                            $active = true;
                            $select2 = 'menuactive listactive';
                        }
                        $name_sub = LanguageHelper::changeDB($ms['name_th'], $ms['name_en']);
                        $list_sub .= "<li>";
                        $list_sub .= CHtml::link($name_sub, array(
                                    '/serviceProvider/default/partnerGroup/', 'id' => $m['id'], 'sp_type_business_sub_id' => $ms['sp_type_business_sub_id']), array(
                                    'rel' => 'view' . $n++,
//                                    'class' => $select2
                        ));
                        $list_sub .= "</li>";
                    }
                    $list_sub .= '</ul>';
                }
                $list_sub .= "</li>";
            }


            echo "<li>";
            echo CHtml::link(Yii::t('language', 'ผู้ให้บริการทั้งหมด'), array(
                '/serviceProvider/default/index'), array(
                'rel' => 'view1',
                'class' => $active == false ? 'menuactive listactive' : ''
            ));
            echo "</li>";
            echo $list_sub;
            ?>
        </ul>
    </div>
</div>