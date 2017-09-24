<?php
session_start();

define('DS', DIRECTORY_SEPARATOR);
require_once 'Application' . DS . 'config.php';
require_once 'Application' . DS . 'Lib' . DS . 'autoLoader.php';
if (isset($_SESSION['id'])) {
require_once PUBLIC_PATH . DS . 'header.php';    
}

$x = new FrontController();
$x->createObj();
ob_end_flush();
