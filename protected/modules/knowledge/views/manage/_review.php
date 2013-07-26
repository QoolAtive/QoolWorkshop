<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => Yii::t('language', 'เนื้อหา'), 'link' => '#', 'select' => 'selected'),
            );
//            $n = 1;
//            foreach ($list as $ls) {
//                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++)) . "</li>";
//            }
            $list2 = array(
                array('text' => Yii::t('language', 'บทความ'), 'link' => '/knowledge/default/index'),
                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '/knowledge/default/index#view2'),
            );
            $n2 = 3;
            foreach ($list2 as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n2++)) . "</li>";
            }
            if (Yii::app()->user->isAdmin()) {
                echo "<li>";
                echo CHtml::link(
                        Yii::t('language', 'จัดการ') . Yii::t('language', 'บทความ'), array(
                    '/knowledge/manage/knowledge'), array(
                    'rel' => 'view5'
                ));
                echo "</li>";
                echo "<li>";
                echo CHtml::link(
                        Yii::t('language', 'จัดการ') . Yii::t('language', 'การเรียนรู้'), array(
                    '/learning/manage/learning'), array(
                    'rel' => 'view6'
                ));
                echo "</li>";
            }

            echo Tool::GenList($list);
            ?> 

        </ul>
    </div>
</div>

<div class="content">
    <div class="tabcontents">
        <div class="knowledgeview">
            <div style="text-align: center;">
                <img src="/file/knowledge/<?php echo $model->image; ?>" style="height: 300px; max-width: 748px;" />
            </div>

            <div class="knowledgeviewtext">
                <?php
                $subject = LanguageHelper::changeDB($model->subject, $model->subject_en);
                $detail = LanguageHelper::changeDB($model->detail, $model->detail_en);
                ?>
                <h3>
                    <img src="/img/iconform.png" alt="icon"/>
                    <?php
                    echo $subject;
                    ?>
                </h3>
                <p><?php echo $detail; ?></p>

                <div style="text-align: center;">
                    <?php
                    echo CHtml::button(Yii::t('language', 'แก้ไข'), array(
                        'onclick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/knowledge/manage/insert/id/' . $model->id,
                        )) . "'",
                        'confirm' => Yii::t('language', 'คุณต้องการแก้ไขบทความหรือไม่?'))
                    );
                    echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'บทความ'), array(
                        'onclick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/knowledge/manage/insert',
                        )) . "'",
                        'confirm' => Yii::t('language', 'คุณต้องการเพิ่มบทความหรือไม่?'))
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

