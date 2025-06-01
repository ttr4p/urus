<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header("Location: parabens.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
