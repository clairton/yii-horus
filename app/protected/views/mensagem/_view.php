<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idmensagem')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idmensagem), array('view', 'id' => $data->idmensagem)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('mensagem')); ?>:
	<?php echo GxHtml::encode($data->mensagem); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('datahora')); ?>:
	<?php echo GxHtml::encode($data->datahora); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('usuario_idusuario')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->usuarioIdusuario)); ?>
	<br />

</div>