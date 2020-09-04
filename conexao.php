<?php
define('SERVER','localhost');
define('BANCO','ddgcafe');
define('SENHA','1234ddgcafe*');
define('USER','ddgcafe');

try {
    $conexao = new PDO('mysql:host='.SERVER.';dbname='.BANCO, USER, SENHA);
    return $conexao;
} catch(PDOException $e) {
    die('Erro: ' . $e->getMessage());
}