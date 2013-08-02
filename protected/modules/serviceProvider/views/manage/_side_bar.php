<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/serviceprovider.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="/serviceProvider/default/index/">ทั้งหมด</a></li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo "<li>" . CHtml::link(Yii::t('language', 'จัดการ'), array('/serviceProvider/manage/typeBusiness')) . "</li>";
            }
            if (!isset($select1))
                $select1 = '';
            if (!isset($select2))
                $select2 = '';
            if (!isset($select3)) {
                $select3 = '';
            }

            $list = array(
                array('text' => Yii::t('language', 'กลุ่มพาร์ทเนอร์'), 'link' => '/serviceProvider/manage/typeBusiness', 'select' => $select1),
                array('text' => Yii::t('language', 'พาร์ทเนอร์'), 'link' => '/serviceProvider/manage/company', 'select' => $select2),
//                
            );
            if ($select3 != null) {
                array_push($list, array('text' => Yii::t('language', 'เพิ่มสินค้าและบริการ'), 'link' => '#', 'select' => $select3));
            }
            echo Tool::GenList($list);
            ?>

        </ul>
    </div>
</div>