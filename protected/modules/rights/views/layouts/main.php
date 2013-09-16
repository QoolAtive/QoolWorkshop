<?php $this->beginContent(Rights::module()->appLayout); ?>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t("language", '/img/iconpage/Member.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
		<?php if( $this->id!=='install' ): ?>

			<div id="menu">

				<?php $this->renderPartial('/_menu'); ?>

			</div>

		<?php endif; ?>
        </ul>
    </div>
</div>


<div class="content">
    <div class="tabcontents">
		<?php $this->renderPartial('/_flash'); ?>

		<?php echo $content; ?>
    </div>
</div>




<?php $this->endContent(); ?>