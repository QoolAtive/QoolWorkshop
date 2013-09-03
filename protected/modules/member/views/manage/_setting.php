<ul class="btnMangae _100">
    <li>
        <?php
        echo CHtml::link(Yii::t("language", 'ระดับการศึกษา'), array('/dataCenter/default/highEducation'));
        ?>
    </li>
    <li>
        <?php
        echo CHtml::link(Yii::t("language", 'ประเภทร้านค้า'), array('/dataCenter/default/companyTypeBusiness'));
        ?>
    </li>
    <li>
        <?php
        echo CHtml::link(Yii::t("language", 'เพศ'), array('/dataCenter/default/sex'));
        ?>
    </li>
    <li>
        <?php
        echo CHtml::link(Yii::t("language", 'คำนำหน้า'), array('/dataCenter/default/titleName'));
        ?>
    </li>
    <li>
        <?php
        echo CHtml::link(Yii::t("language", 'ชื่อเว็บ'), array('/dataCenter/default/titleWeb'));
        ?>
    </li>
    <li>
        <?php
        echo CHtml::link(Yii::t("language", 'รายละเอียด'), array('/dataCenter/default/description'));
        ?>
    </li>
    <li>
        <?php
        echo CHtml::link(Yii::t("language", 'คำสำคัญ'), array('/dataCenter/default/keyword'));
        ?>
    </li>
    <li>
        <?php
        echo CHtml::link(Yii::t("language", 'แผนที่เว็บไซต์'), array('/dataCenter/default/siteMap'));
        ?>
    </li>
</ul>