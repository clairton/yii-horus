<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'mensagem-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'mensagem'); ?>
		<?php echo $form->textField($model, 'mensagem', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'mensagem'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'datahora'); ?>
		<?php echo $form->textField($model, 'datahora'); ?>
		<?php echo $form->error($model,'datahora'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'usuario_idusuario'); ?>
		<?php echo $form->dropDownList($model, 'usuario_idusuario', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'usuario_idusuario'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->