<?php

Yii::import('application.models._base.BaseMensagem');

class Mensagem extends BaseMensagem
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}