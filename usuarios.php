<?php
include_once("app/autoload.php");

$criteria= new CDbCriteria();

$usuario= Usuario::model()->findByPk(1, $criteria);
echo '<pre>';
print_r($usuario);
echo '</pre>';

$criteria= new CDbCriteria();
$criteria->order = 'nome';

$usuarios= Usuario::model()->findAll($criteria);
echo '<pre>';
print_r($usuarios);
echo '</pre>';

