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

function insertData($table, $data) {
    try {
        $connect = connection();
        $cmd = $connect->prepare("INSERT INTO $table (nome, telefone, email) VALUES (:nome, :telefone, :email)");
        $cmd->bindValue(':nome', $data['name']);
        $cmd->bindValue(':telefone', $data['telefone']);
        $cmd->bindValue(':email', $data['email']);
        $cmd->execute();
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function deleteData($table, $data) {
    try {
        $connect = connection();
        $cmd = $connect->prepare("DELETE FROM $table WHERE email = :email");
        $cmd->bindValue(':email', $data['email']);
        $cmd->execute();
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
function obterBanco($table) {
    try {
        $connect = connection();
        $cmd = $connect->prepare("SELECT nome, telefone, email FROM $table");
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}

function printarBanco($table) {
    try {
        $connect = connection();
        $db = obterBanco($table);
    }
    catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}