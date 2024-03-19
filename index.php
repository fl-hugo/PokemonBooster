<?php 
include_once('_config.php');
date_default_timezone_set('Europe/Paris');
MyAutoLoad::start();

$request = $_GET['action'] ?? 'home';

$routeur = new router($request);
$routeur->renderController();
?>