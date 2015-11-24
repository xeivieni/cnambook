<?php
/**
 * Created by PhpStorm.
 * User: clem
 * like.php
 * Program to add a like in the database
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Getting the different useful ids
$statusId = $_GET["id"];
$userId = $_SESSION["id"];

//Getting the like if already exists
$getLikeStmt = $conn->prepare('SELECT * FROM Likes WHERE iduser=:iduser and idstatut=:idstatut');
$getLikeStmt->execute(array('iduser' => $userId, 'idstatut' => $statusId));
$count = $getLikeStmt->rowCount();

if ($count == 0) {
    //If user haven't already liked this status : create like in the database
    $addLikeStmt = $conn->prepare('INSERT INTO Likes(idlike, heure, iduser, idstatut) VALUES (NULL,CURRENT_TIMESTAMP, :iduser,:idstatut)');
    $addLikeStmt->execute(array('iduser' => $userId, 'idstatut' => $statusId));
} else {
    //If user have already liked this status : remove like from the database
    $rmLikeStmt = $conn->prepare('DELETE FROM Likes WHERE iduser=:iduser AND idstatut=:idstatut');
    $rmLikeStmt->execute(array('iduser' => $userId, 'idstatut' => $statusId));
}

header('Location: ' . $_SERVER['HTTP_REFERER']); //Redirect