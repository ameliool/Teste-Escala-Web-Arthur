<?php

$host = "mysql.escalaweb.com.br";
$dbname = "escalaweb16";
$usuario = "escalaweb16";
$senha = "yf8ahqe4";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

return $pdo;