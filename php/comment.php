<?php
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include ("config.php");
$idstatut = $_GET["id"];
$comment = $_GET["infos[0]"];
$iduser = $_SESSION["id"];

    $stmt2 = $conn->prepare('INSERT INTO Likes(idlike, date, heure, iduser, idstatut) VALUES (NULL,CURRENT_DATE,CURRENT_TIMESTAMP, :iduser,:idstatut)');
    $stmt2->execute(array('iduser' => $iduser, 'idstatut' => $idstatut));


header('Location: ' . $_SERVER['HTTP_REFERER']);

?>