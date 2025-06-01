<?php
session_start();
if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit;
}
echo "<h1>Parabéns, você está logado!</h1>";
?>
