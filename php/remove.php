<?php
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");
$idstatut = $_GET["id"];

$stmt3 = $conn->prepare('DELETE FROM Statut WHERE idstatut=:idstatut');
$stmt3->execute(array('idstatut' => $idstatut));


header('Location: ' . $_SERVER['HTTP_REFERER']);

?>