<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/knowledge.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="#" rel="view1">บทความแนะนำ</a></li>
            <li><a href="#" rel="view2">บทความทั้งหมด</a></li>
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
    </div>
</div>
