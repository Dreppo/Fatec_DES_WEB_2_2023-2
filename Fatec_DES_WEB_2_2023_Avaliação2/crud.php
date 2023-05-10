<?php
require_once('BD_connect.php');

$objeto1 = new DBConnect(); 
# print_r($objeto1->conn);
$objeto1 -> inserir_dados(null,'teste2','2144545','4574598475',false);

$objeto1 ->select_dados();

$objeto1 ->atualiza();

$objeto1 ->deleta();

unset($objeto1);

$objeto1 = new DBConnect(); 
?>