<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/motivorefencPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/motivorefencPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/motivorefencPDO.php';
        }
    }
}

$classe = new motivorefencPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

