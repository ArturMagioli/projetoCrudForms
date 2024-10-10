<?php
//Lida com o CRUD:
require_once "../control/crudDb.php";
$data = $_POST;
print_r($data);
$nome = $data['nome'] ?? null;
$telefone = $data['telefone'] ?? null;
$email = $data['email'] ?? null;
$data['operacao'] = 'c';
// tabela dinâmica:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($data['operacao'] === 'c' && $nome && $telefone && $email) {
        insertData('pessoas', $data);
    }
    else if ($data['operacao'] === 'd') {
        //$data =
        deleteData('pessoas', $data['id']);
    }
    else if ($data['operacao'] === 'a') {
        $pessoa = obterLinha('pessoas', 'id', $data['id']);
       // getData($pessoa);
    }
}
?>

<html lang="pt-br">
<?php include_once 'header.php'?>
<body>
<?php include 'formulario.php'?>
<?php include 'tabelaDinamica.php' ?>
</body>
</html>