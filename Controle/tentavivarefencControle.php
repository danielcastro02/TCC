<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/tentavivarefencPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/tentavivarefencPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/tentavivarefencPDO.php';
        }
    }
}

$classe = new tentavivarefencPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

