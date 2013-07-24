<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/serviceprovider.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a rel="view7" href="#">Partner Groups</a></li>
            <li><a rel="view8" href="#">Partners</a></li>
            <?php
            $menu = SpTypeBusiness::model()->findAll();
            foreach ($menu as $data) {
                ?>
                <li><a rel="view<?php echo $data['id'] ?>" href="/serviceProvider/default/index#view<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>