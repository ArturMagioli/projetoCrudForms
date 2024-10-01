<?php

$data = $_POST;

function connection() {
    try {
        $pdo = new PDO('sqlite:C:\Users\Artur.Magioli\Documents\bancos\banco_formulario.sqlite');
        echo "Né que deu certo, mano";
        return $pdo;
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    catch (Exception $e) {
        echo "Unexpected error: " . $e->getMessage();
    }
}
function printarBanco() {
    $connect = connection();
    $cmd = $connect->prepare("SELECT * FROM pessoas");
}

printarBanco();