<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

////Lida com o CRUD:
//require_once "modelos/crudDb.php";
//$data = $_POST;
//$nome = $data['nome'] ?? null;
//$telefone = $data['telefone'] ?? null;
//$email = $data['email'] ?? null;
//$operacao = $data['operacao'] ?? null;
//
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    if ($operacao === 'c' && $nome && $telefone && $email) {
//        insertData('pessoas', $data);
//    }
//    else if ($operacao === 'd') {
//        //$data =
//        deleteData('pessoas', $data['id']);
//    }
//    else if ($operacao === 'a' || $data['operacao'] === 'a2') {
//        $pessoa = obterLinha('pessoas', 'id', $data['id']);
//        if ($operacao === 'a2') {
//            editData($data);
//            $pessoa = null;
//        }
//    }
//}
//?>


<html lang="pt-br">
<?php include_once 'views/header.php' ?>
<body>
<?php
if (isset($_GET['operacao'])) {
    if (file_exists('controllers/' . $_GET['operacao'] . '.php')) {
        include_once 'controles/' . $_GET['operacao'] . '.php';
    }
} else {
    include_once 'controles/cadastrarPessoa.php';
}
?>
<?php require 'controles/obterTabelaDinamica.php' ?>
</body>
</html>