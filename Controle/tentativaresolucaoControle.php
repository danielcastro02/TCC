<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/tentativaresolucaoPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/tentativaresolucaoPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/tentativaresolucaoPDO.php';
        }
    }
}

$classe = new tentativaresolucaoPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

