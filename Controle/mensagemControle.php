<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/mensagemPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/mensagemPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/mensagemPDO.php';
        }
    }
}

$classe = new mensagemPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

