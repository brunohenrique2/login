<?php

    $host = 'localhost';
    $nome = 'root';
    $senha = '';
    $db = 'login';

    $conn = new mysqli($host, $nome, $senha, $db);

    if(!$conn) {
        die('Falha ao se conectar: ' . mysqli_connect_error()) . '<br>';
    }else {
       echo 'conectado com sucesso <br>';
    }

?>