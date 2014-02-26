<?php

require __DIR__.'/vendor/autoload.php';

$yii = __DIR__.'/vendor/square1-io/yii-framework/yii.php';
$config = __DIR__.'/protected/config/main.php';

// Remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
