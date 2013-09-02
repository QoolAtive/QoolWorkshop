<div class="colright">
    <ul class="loginbtnbox">
        <li class="clearfix">  
            <?php
            if (!Yii::app()->user->id) {
                ?>
                <a class="createaccountbtn fancybox" href="/member/manage/registerRules">Create Account</a> 
                <a class="loginbtn fancybox fclogin" href="/site/login">Login</a>
                <?php
            } else {
                $profile = Tool::getProfile();
                ?>
                <a href="/site/logout" class="loginbtn " onClick="return confirm('<?php echo Yii::t('language', 'คุณต้องการออกจากระบบหรือไม่?'); ?>')">Logout</a>
                <a href="/member/manage/profile" class="loginbtn " ><?php echo $profile['name']; ?></a>
                <?php
            }
            ?>
        </li>

        <li class="clearfix">
            <!--<input class="searchbox" placeholder="Search" type="text" name="" value="" />--> 
            <?php
            // google_search
            $this->widget('application.extensions.search.GoogleSearch');
//            $this->widget('ext.esearch.SearchBoxPortlet');
//or
//            SearchAction::renderInputBox();
//or
//            $this->renderPartial('extensions/esearch/views/inputBox.php');
            ?>
        </li>

        <li class="clearfix " style="width: 100%;">
            <a href="#"><img class="rightindex" alt="EN" src="/img/en.png"></a>
            <a href="#"><img class="rightindex" alt="TH" src="/img/th.png"></a>
        </li>
    </ul> 
</div>