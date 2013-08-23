<div class="sidebar">
    <div class="menuitem">
        <ul>           
             <li class="boxhead" style="background-size: 225px; background: url('<?php echo Yii::t('language', '/img/iconpage/edir.png'); ?>');" ></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $type_list = CompanyTypeBusiness::model()->findAll();
            echo "<li>";
            echo CHtml::link(Yii::t('language', 'ทั้งหมด'), array('/eDirectory/default/index', 'id' => null), array('rel' => 'view1'));
            echo "</li>";
            if (Yii::app()->user->isAdmin())
                echo '<li class"">' . CHtml::link(Yii::t('language', 'จัดการร้านค้า'), array('/eDirectory/admin/index'), array('rel' => 'view2')) . '</li>';
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
            ?>
        </ul>
    </div>
</div>