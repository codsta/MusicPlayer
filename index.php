<?php
session_start();

require('config.php');

spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
function include_all_php($folder){
    foreach (glob("{$folder}/*.php") as $filename)
    {
        include $filename;
    }
}

include_all_php("controllers");
include_all_php("models");

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}
