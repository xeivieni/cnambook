<?php
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");
$idstatut = $_GET["idstatut"];
$comment = $_GET["texte"];
$iduser = $_SESSION["id"];

$stmt2 = $conn->prepare('INSERT INTO Commentaires (idcomm, iduser, idstatut, texte, heure) VALUES (NULL, :iduser, :idstatut, :texte, CURRENT_TIMESTAMP)');
$stmt2->execute(array('iduser' => $iduser, 'idstatut' => $idstatut, 'texte' => $comment));

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>