<?php



error_reporting(E_ALL);

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
define('YII_DEBUG',true);
define('YII_TRACE_LEVEL',3);
// specify how many levels of call stack should be shown in each log message

require_once($yii);
Yii::createWebApplication($config)->run();
