<?php
//Lida com o CRUD:
require_once "modelos/crudDb.php";

$data = $_POST;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($data)) {
    if ($data['operacao'] === 'c' && $data['nome'] && $data['telefone'] && $data['email']) {
        insertData('pessoas', $data);
        header('location: ' . $_SERVER['PHP_SELF']); //O header irá atualizar a página e impedir a permanência dos dados dentro do $_POST
        exit(); //O exit terminha a execução do código
    } else {
        echo "Erro ao inserir os dados: preencha todos os campos!";
    }
}
include 'views/formulario.php';