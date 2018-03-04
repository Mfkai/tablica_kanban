<?php
include 'config/db.php';

$sort_id = $_POST["sort_id"];

for($i=0; $i<count($sort_id); $i++)
{
	$stmt = $pdo->prepare("UPDATE punkt SET listpunkt = '".$i."'  WHERE pid = '".$sort_id[$i]."'");
	$stmt->execute();
 }
?>