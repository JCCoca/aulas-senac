<?php 

try {
    $connection = new PDO('mysql:host=localhost;dbname=meu_estoque;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, 
        PDO::ATTR_EMULATE_PREPARES   => false
    ]);
} catch (PDOException $error) {
    echo "<b>ERRO FATAL NA CONEXÃO</b><br>
        <b>CÓDIGO:</b> {$error->getCode()}<br>
        <b>MENSAGEM:</b> {$error->getMessage()}<br>
        <b>ARQUIVO:</b> {$error->getFile()}<br>
        <b>LINHA:</b> {$error->getLine()}<br>";
    exit;
}

