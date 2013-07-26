<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/serviceprovider.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $menu = SpTypeBusiness::model()->findAll();
            $select = '';
            $n = 1;
            foreach ($menu as $m) {
                if ($id == $m['id']) {
                    $select = 'selected';
                }
                echo '<li class=' . $select . '>' . CHtml::link($m['name'], array('/serviceProvider/default/index/', 'id' => $m['id']), array('rel' => 'view' . $n++)) . '</li>';
            }
            if (Yii::app()->user->isAdmin()) {
                echo "<li>" . CHtml::link('Manage', array('/serviceProvider/manage/company')) . "</li>";
            }
            ?>

        </ul>
    </div>
</div>