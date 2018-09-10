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

try {
    if (empty($_POST) && empty($_SERVER["userName"])) {
        $controller->start();

    } elseif ($_REQUEST['action'] == 'auth') {
        $controller->reviseUser();

    } elseif ($_REQUEST['action'] == 'red') {
        $controller->addUser();

    } elseif ($_REQUEST['action'] == 'add') {
        $controller->add();

    } elseif ($_REQUEST['action'] == 'logOut') {
        $controller->logOut();

    } else {
        $controller->form();
    }
}  catch (Exception $e) {
    require "app/errors/404.php";
}