<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/motivoencaminhamentoPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/motivoencaminhamentoPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/motivoencaminhamentoPDO.php';
        }
    }
}

$classe = new motivoencaminhamentoPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

