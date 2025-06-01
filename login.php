<?php
session_start();

$login = $_POST['login'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($login === 'neto' && $senha === '123') {
    $_SESSION['logado'] = true;
    header("Location: parabens.php");
    exit;
} else {
    echo "Login ou senha incorretos.";
}
?>
