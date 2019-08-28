<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/encaminhamentoPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/encaminhamentoPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/encaminhamentoPDO.php';
        }
    }
}

$classe = new encaminhamentoPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

