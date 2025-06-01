<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $pdo = new PDO("mysql:host=nozomi.proxy.rlwy.net;port=44657;dbname=railway", "root", "YEWxrQLjwcJdTssEjnNUpSMYZMFhjSdk");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE login = ? AND senha = ?");
    $stmt->execute([$login, $senha]);

    if ($stmt->rowCount() == 1) {
        $_SESSION["logado"] = true;
        header("Location: parabens.php");
        exit;
    } else {
        $erro = "Login inválido!";
    }
}
?>
<form method="post">
    <input type="text" name="login" placeholder="Login" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>
<?php if (!empty($erro)) echo "<p>$erro</p>"; ?>
