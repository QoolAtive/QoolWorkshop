<div class="sidebar">
    <div class="menuitem">
        <ul>           
            <li class="boxhead" style="background: url('<?php echo Yii::t('language', '/img/iconpage/edir.png'); ?>'); background-size: 227px; margin-left: -1px; " ></li>
        </ul>
        <ul class="tabs clearfix">
            <?php            
            // echo "<li>";
            // echo CHtml::link(Yii::t('language', 'ร้านค้าทั้งหมด'), array('/eDirectory/default/index'), array('rel' => 'view1', 'class' => 'selected'));
            // echo "</li>";
            if (Yii::app()->user->isAdmin()) {
                echo '<li>' . CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'), array('/eDirectory/admin/index'), array('rel' => 'view2')) . '</li>';
            }
            /*
              $n = 3;
              foreach ($type_list as $data) {
              if ($id == $data['id']) {
              echo "<li class='selected'>";
              } else {
              echo "<li class=''>";
              }
              echo CHtml::link(Yii::t('language', $data['name']), array('/eDirectory/default/index', 'id' => $data['id']), array('rel' => 'view' . $n++));
              echo "</li>";
              }
             * */
            ?>
        </ul>
        <div class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
             border-top: 2px solid gold;
             font-size: 16px;
             margin-top: 6px;
             padding: 14px 0;">
            <p style="font-weight: bold;">
                <?php
                echo Yii::t('language', 'ประเภทร้านค้า');
                ?>
            </p>
        </div>
        <ul class="rectangle-list">
            <p class="demoline"></p>
            <?php
            $list_sub = '';
            $active = false;
            $type_list = CompanyTypeBusiness::model()->findAll();
            foreach ($type_list as $m) {
                $select = '';
                if ($id == $m['id']) {
                    $active = true;
                    $select = 'menuactive listactive';
                }
                $name = LanguageHelper::changeDB($m['name'], $m['name_en']);
                $list_sub .= "<li>";
                $list_sub .= CHtml::link($name, array(
                            '/eDirectory/default/index', 'id' => $m['id']), array(
                            'rel' => 'view' . $n++,
                            'class' => $select
                ));
                $list_sub .= "</li>";
            }


            echo "<li>";
            echo CHtml::link(Yii::t('language', 'ร้านค้าทั้งหมด'), array(
                '/eDirectory/default/index'), array(
                'rel' => 'view1',
                'class' => $active == false ? 'menuactive listactive' : ''
            ));
            echo "</li>";
            echo $list_sub;
            ?>
        </ul>
    </div>
</div>