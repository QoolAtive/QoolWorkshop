<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/serviceprovider.png"/></li>
        </ul>
        <ul class="tabs clearfix">

            <?php
            $menu = SpTypeBusiness::model()->findAll();
            foreach ($menu as $data) {
                ?>
                <li><a href="/serviceProvider/default/index/id/<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></li>
                <?php
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