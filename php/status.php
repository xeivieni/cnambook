<?php
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");
$statut = $_GET["statut"];
$iduser = $_SESSION["id"];

$stmt2 = $conn->prepare('INSERT INTO Statut(idstatut, texte, heure, iduser) VALUES (NULL,:statut,CURRENT_TIMESTAMP, :iduser)');
$stmt2->execute(array('iduser' => $iduser, 'statut' => $statut));

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>