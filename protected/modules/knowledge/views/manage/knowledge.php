<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/knowledge.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="#" rel="view1">บทความแนะนำ</a></li>
            <li><a href="#" rel="view2">บทความทั้งหมด</a></li>
            <?php
            $list = array(
                array('text' => 'Knowledge', 'link' => '/knowledge/default/index'),
                array('text' => 'Learning', 'link' => '/knowledge/default/index#view2'),
            );
            $n = 3;
            foreach ($list as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++)) . "</li>";
            }
//            echo Tool::GenList($list);
            ?> 

            <li>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link('Manage Knowledge', array('/knowledge/manage/knowledge'), array('rel' => 'view5'));
                }
                ?>
            </li>
            <li> 
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link('Manage Learning', array('/learning/manage/learning'), array('rel' => 'view6'));
                }
                ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <h3>บทความแนะนำ</h3>
            <hr>
            <div style="text-align: center;">
                <?php
                echo CHtml::button('เพิ่มบทความ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/knowledge/manage/insert'
                    )) . "'")
                );
                ?>
            </div>
            <hr>
            <?php
            $this->renderPartial('_grid_guide_knowledge', array(
                'model' => $model,
            ));
            ?>
            <hr>
            <div style="text-align: center;">
                <?php
                echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        Yii::app()->user->getState('knowledge')
                    )) . "'")
                );
                ?>
            </div>
            <hr>
        </div>
        <div id="view2" class="tabcontent">
<h3>บทความทั้งหมด</h3>
            <hr>
            <div style="text-align: center;">
                <?php
                echo CHtml::button('เพิ่มบทความ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/knowledge/manage/insert'
                    )) . "'")
                );
                ?>
            </div>
            <hr>
            <?php
            $this->renderPartial('_grid_all_knowledge', array(
                'model' => $model,
            ));
            ?>
            <hr>
            <div style="text-align: center;">
                <?php
                echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        Yii::app()->user->getState('knowledge')
                    )) . "'")
                );
                ?>
            </div>
            <hr>
        </div>
<!--        <div id="view3" class="tabcontent">

        </div>
        <div id="view4" class="tabcontent">

        </div>
        <div id="view5" class="tabcontent">

        </div>
        <div id="view6" class="tabcontent">
            
        </div>-->
    </div>
</div>
