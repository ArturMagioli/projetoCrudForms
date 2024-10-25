<?php
//Lida com o CRUD:
require_once "modelos/crudDb.php";
$data = $_POST;
$feedback = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($data)) {
    if ($data['operacao'] === 'cadastrarPessoa' && $data['nome'] && $data['telefone'] && $data['email'] && !obterLinha('pessoas', 'email', $data['email'])) {
        insertData('pessoas', $data);
        $feedback = "Cadastro efetuado com sucesso!";
        header('location: ' . $_SERVER['PHP_SELF']."?feedback=".urldecode($feedback)); //O header irá atualizar a página e impedir a permanência dos dados dentro do $_POST
        $data = null;
        exit(); //O exit terminha a execução do código
    } else {
        $data = null;
        $feedback = "Erro ao inserir os dados.";
        header('location: ' . $_SERVER['PHP_SELF']."?feedback=".urldecode($feedback));
    }
}
include 'views/formulario.php';