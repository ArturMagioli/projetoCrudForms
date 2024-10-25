<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "modelos/crudDb.php";
?>
<html lang="pt-br">
<?php include_once 'views/head.php' ?>
<body>
<?php
if (isset($_GET['operacao'])) {
    if (file_exists('controles/' . $_GET['operacao'] . '.php')) {
        include_once 'controles/' . $_GET['operacao'] . '.php';
    }
} else if (isset($_POST['operacao'])) {
    if (file_exists('controles/' . $_POST['operacao'] . '.php')) {
        include_once 'controles/' . $_POST['operacao'] . '.php';
    }
}
else {
    include_once 'controles/cadastrarPessoa.php';
}
?>
<?php require 'controles/obterTabelaDinamica.php' ?>
</body>
</html>