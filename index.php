<?php
session_start();
require "vendor/autoload.php";

$controller = new \App\Controllers\ArticleController();


//$controller->addUser();



//if(!empty($_POST)){
//    $controller->add();
//} else {
//    $controller->form();
//}


if (empty($_POST)) {
    $controller->start();

} elseif ($_REQUEST['action'] == 'auth') {
    $controller->reviseUser();

} elseif ($_REQUEST['action'] == 'red') {
    $controller->addUser();

} elseif ($_REQUEST['action'] == 'add') {
    $controller->add();

}