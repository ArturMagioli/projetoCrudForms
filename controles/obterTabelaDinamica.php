<?php
    require_once 'modelos/crudDb.php';
    $table = [];
    $table = obterBanco('pessoas');
    include 'views/tabelaDinamica.php';
?>