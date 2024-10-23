<?php
    $feedback = '';
    require_once 'modelos/crudDb.php';
    if(deleteData('pessoas', $_GET['id'])) {
        $feedback = 'Registro deletado com sucesso!';
        header("Location: ". $_SERVER['PHP_SELF']."?feedback=".urlencode($feedback));
    }else {
        echo 'Erro ao deletar registro!';
    }
    include_once 'views/formulario.php';