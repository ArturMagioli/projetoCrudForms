<?php
require_once 'modelos/crudDb.php';
var_dump($_POST);
if (isset($_GET['id'])) {
    $pessoa = obterLinha('pessoas', 'id', $_GET['id']);
}

if (isset($_POST['operacao'])) {
    editData($_POST);
    $pessoa = null;
    header("location: ".$_SERVER['PHP_SELF']);
}
include_once 'views/formulario.php';