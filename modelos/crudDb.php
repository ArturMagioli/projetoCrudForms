
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

function obterLinha($table, $tipo, $value) {
    $connect = connection();
    try {
        $cmd = $connect->prepare("SELECT * FROM $table WHERE $tipo = :value ");
        $cmd->bindValue(':value', $value);
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $cmd->execute();
    return $cmd->fetch(PDO::FETCH_ASSOC);
}

function insertData($table, $data): void {
    try {
        if(!obterLinha($table, 'email', $data['email'])) {
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

function deleteData($table, $id): bool {
    try {
        $connect = connection();
        $cmd = $connect->prepare("DELETE FROM $table WHERE id = :id");
        $cmd->bindValue(':id', $id);
        $cmd->execute();
        return true;
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    return false;
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

function editData($newData): void {
    $connect = connection();
    $cmd = $connect->prepare("UPDATE pessoas SET nome = :nome, telefone = :telefone, email = :email WHERE id = :id");
    $cmd->bindValue(':nome', $newData['nome']);
    $cmd->bindValue(':telefone', $newData['telefone']);
    $cmd->bindValue(':email', $newData['email']);
    $cmd->bindValue(':id', $newData['id']);
    $cmd->execute();
}
