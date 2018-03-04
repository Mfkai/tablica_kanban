<?php
include 'config/db.php';

$id = $_GET['id'];
$kolumna = $_GET['kolumna'];

$stmt = $pdo->prepare("UPDATE punkt SET tid = :kolumna WHERE pid = :id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':kolumna', $kolumna);
$stmt->execute();
?>