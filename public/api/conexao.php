<?php

$host = "localhost"; 
$usuario = "root";   // padrão do XAMPP
$senha = "";         // vazio mesmo
$banco = "vcar";     // nome do banco que você criou

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conectado!";
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
