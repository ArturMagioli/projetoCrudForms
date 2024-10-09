<?php
function connection() {
    try {
        $pdo = new PDO('sqlite:C:\Users\Artur.Magioli\PhpstormProjects\projetoCrudForms\dataBase\banco_forms.sqlite');
        return $pdo;
    }
    catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
    catch (Exception $e) {
        return "Unexpected error: " . $e->getMessage();
    }
}

function obterLinha($table, $email) {
    $connect = connection();
    $cmd = $connect->prepare("SELECT * FROM $table where email = :email");
    $cmd->bindValue(':email', 'opa@graduação.uerj.br');
    $cmd->execute();
    return $cmd->fetch(PDO::FETCH_ASSOC);
}

function insertData($table, $data): void {
    try {
        if(!obterLinha($table, $data['email'])) {
            $connect = connection();
            $cmd = $connect->prepare("INSERT INTO $table (nome, telefone, email) VALUES (:nome, :telefone, :email)");
            $cmd->bindValue(':nome', $data['nome']);
            $cmd->bindValue(':telefone', $data['telefone']);
            $cmd->bindValue(':email', $data['email']);
            $cmd->execute();
        }
        else {
            echo "O usuário encontra-se registrado!";
        }
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function deleteData($table, $id): void {
    try {
        $connect = connection();
        $cmd = $connect->prepare("DELETE FROM $table WHERE id = :id");
        $cmd->bindValue(':id', $id);
        $cmd->execute();
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
function obterBanco($table): array {
    try {
        $connect = connection();
        $cmd = $connect->prepare("SELECT * FROM $table");
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return array();
    }
}

function editData($table, $data, $email) {
    $connect = connection();
    $cmd = $connect->prepare("UPDATE $table SET nome = :nome, telefone = :telefone, email = :email WHERE email = :email");
    $cmd->bindValue(':nome', $data['nome']);
    $cmd->bindValue(':telefone', $data['telefone']);
    $cmd->bindValue(':email', $data['email']);
    $cmd->bindValue(':email', $email);
}