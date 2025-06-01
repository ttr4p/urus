<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Parabéns</title>
</head>
<body>
    <h1>🎉 Parabéns, você está logado com sucesso!</h1>
</body>
</html>
