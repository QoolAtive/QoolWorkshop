<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/serviceprovider.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="/serviceProvider/default/index/" rel="view1">ทั้งหมด</a></li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo "<li>" . CHtml::link(Yii::t('language', 'จัดการ'), array('/serviceProvider/manage/typeBusiness'), array('rel' => 'view2')) . "</li>";
            }
            $menu = SpTypeBusiness::model()->findAll();
            $select = '';
            $n = 3;
            foreach ($menu as $m) {
                if ($id == $m['id']) {
                    $select = 'selected';
                }
                echo '<li class=' . $select . '>' . CHtml::link($m['name'], array('/serviceProvider/default/partnerGroup/', 'id' => $m['id']), array('rel' => 'view' . $n++)) . '</li>';
            }
            ?>
        </ul>
    </div>
</div>