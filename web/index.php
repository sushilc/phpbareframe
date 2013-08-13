<?php
define('BASE_PATH', __DIR__ . '/..');

require_once '../lib/Framework/App.php';
$app = \Framework\App::getInstance();
$app->registerAutoloader();
$app->init();
