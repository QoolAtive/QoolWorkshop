<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/Member.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="#" rel="view1">Confirm Registration Member</a></li>
            <li><a href="#" rel="view2">Registration Member</a></li>
            <li><a href="#" rel="view3">Person Member</a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <h3>สมาชิกนิติบุคคลทั้งหมดที่ยังไม่ได้รับการยืนยัน</h3>
            <?php
            echo $this->renderPartial('_admin_grid_view', array(
                'dataProvider' => $model->getRegistration(),
                'model' => $model,
            ));
            ?>
            <div style="text-align: center;">
                <?php
                echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/member/manage/profile'
                    )) . "'")
                );
                ?>
            </div>
        </div>
        <div id="view2" class="tabcontent">
            <h3>สมาชิกนิติบุคคลทั้งหมด</h3>
            <?php
            echo $this->renderPartial('_admin_grid_view', array(
                'dataProvider' => $model->getDataRegistration(),
                'model' => $model,
            ));
            ?>
            <div style="text-align: center;">
                <?php
                echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/member/manage/profile'
                    )) . "'")
                );
                ?>
            </div>
        </div>
        <div id="view3" class="tabcontent">
            <h3>สมาชิกบุคคลธรรมดาทั้งหมด</h3>
            <?php
            echo $this->renderPartial('_admin_grid_view', array(
                'dataProvider' => $model->getDataPerson(),
                'model' => $model,
            ));
            ?>
            <div style="text-align: center;">
                <?php
                echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/member/manage/profile'
                    )) . "'")
                );
                ?>
            </div>
        </div>
    </div>
</div>