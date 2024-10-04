<?php

$data = $_POST;
include_once 'crudDb.php';
//deleteData('pessoas', $data);
insertData('pessoas', $data);
print_r(obterBanco('pessoas'));
//printarBanco('pessoas');