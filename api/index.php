<?php
require __DIR__ . '/restserver/RestServer.php';
require_once('config.php');
require_once('logger.php');
require_once('controller/content.php');
require_once('controller/user.php');

$logger=new Logger($config["path"]["basedir"].$config["path"]["log"]);
$server = new \RestServer\RestServer($config['db'],$logger,'debug');
$server->addClass('ContentController');
$server->handle();
?>
