<?php

include 'class/class.crud.php';
include 'config/db.php';
$crud = new Crud($pdo);

$txid = $_GET['txid'];
if(isset($txid)){
	$crud->usunTytul($txid);
}

$pxid = $_GET['pxid'];
if(isset($pxid)){
	$crud->UsunPunkt($pxid);
}

$poxid = $_GET['poxid'];
if(isset($poxid)){
	$crud->usunPodpunkt($poxid);
}
?>
