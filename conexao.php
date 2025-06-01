<?php
$host = 'nozomi.proxy.rlwy.net';
$port = '44657';
$dbname = 'railway';
$user = 'root';
$pass = 'YEWxrQLjwcJdTssEjnNUpSMYZMFhjSdk';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
?>