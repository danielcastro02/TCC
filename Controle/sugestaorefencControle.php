<?php

if (!isset($_SESSION)) {
    session_start();
}

if (realpath('./index.php')) {
    include_once './Controle/sugestaorefencPDO.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/sugestaorefencPDO.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/sugestaorefencPDO.php';
        }
    }
}

$classe = new sugestaorefencPDO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    $classe->$metodo();
}

