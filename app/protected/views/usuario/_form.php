<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'usuario-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model, 'nome', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'nome'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ultimaconexao'); ?>
		<?php echo $form->textField($model, 'ultimaconexao'); ?>
		<?php echo $form->error($model,'ultimaconexao'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('mensagems')); ?></label>
		<?php echo $form->checkBoxList($model, 'mensagems', GxHtml::encodeEx(GxHtml::listDataEx(Mensagem::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->