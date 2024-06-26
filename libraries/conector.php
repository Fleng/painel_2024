<?php
$host = 'localhost'; // Pode ser diferente dependendo do servidor onde está hospedado
$database = 'painel_controle';
$username = 'root';
$password = '';

// Conexão com o banco de dados usando a função mysqli_connect
$conexao = mysqli_connect($host, $username, $password, $database);

// Verificação da conexão
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Configuração do timezone para São Paulo (SP)
date_default_timezone_set('America/Sao_Paulo');

// Forçar o texto a ser UTF-8
mysqli_set_charset($conexao, 'utf8');

$blog_usuario = "eu";
?>