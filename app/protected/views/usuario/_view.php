<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('idusuario')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->idusuario), array('view', 'id' => $data->idusuario)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ultimaconexao')); ?>:
	<?php echo GxHtml::encode($data->ultimaconexao); ?>
	<br />

</div>