<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/serviceprovider.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a rel="view1" href="#">Hosting</a></li>
            <li><a rel="view2" href="#">Payment</a></li>
            <li><a rel="view3" href="#">E-Marketplace</a></li>
            <li><a rel="view4" href="#">Logistic</a></li>
            <li><a rel="view5" href="#">Design Website</a></li>
            <li><a rel="view6" href="#">Promotion</a></li>
            
            <?php 
            if(Yii::app()->user->isAdmin()){
                echo "<li>" . CHtml::link('Manage', array('/serviceProvider/manage/index')) . "</li>";
            }
            ?>
            
        </ul>
    </div>
</div>