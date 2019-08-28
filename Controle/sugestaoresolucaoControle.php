<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/sugestaoresolucaoPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/sugestaoresolucaoPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/sugestaoresolucaoPDO.php';
        }
    }
}

$classe = new sugestaoresolucaoPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

