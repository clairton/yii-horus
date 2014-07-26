<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idmensagem'); ?>
		<?php echo $form->textField($model, 'idmensagem'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'mensagem'); ?>
		<?php echo $form->textField($model, 'mensagem', array('maxlength' => 45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'datahora'); ?>
		<?php echo $form->textField($model, 'datahora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'usuario_idusuario'); ?>
		<?php echo $form->dropDownList($model, 'usuario_idusuario', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
