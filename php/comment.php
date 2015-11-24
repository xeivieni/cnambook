<?php
/**
 * Created by PhpStorm.
 * User: clem
 * comment.php
 * Adds a new comment in the database. Required parameters are :
 * Status id
 * User id
 * Comment text
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Getting the infos of the comment to publish
$statusId = $_GET["idstatut"];
$comment = $_GET["texte"];
$userId = $_SESSION["id"];

//Updating the table "Commentaire" of the database
$postCommentStmt = $conn->prepare('INSERT INTO Commentaires (idcomm, iduser, idstatut, texte, heure) VALUES (NULL, :iduser, :idstatut, :texte, CURRENT_TIMESTAMP)');
$postCommentStmt->execute(array('iduser' => $userId, 'idstatut' => $statusId, 'texte' => $comment));

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>