<?php
/**
 * Created by PhpStorm.
 * User: clem
 * unfriend.php
 * Removes the friendship between two users (the given user id and the session user id)
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Getting the different ids
$receiverId = $_GET["id"];
$senderId = $_SESSION["id"];

//SQL request for removing the friendship (Note : each user can be either iduser2 or iduser1)
$removeFriendshipStmt = $conn->prepare('DELETE FROM Amis WHERE (iduser2=:idsender and iduser1=:idreceiver) or (iduser1=:idsender and iduser2=:idreceiver)');
$removeFriendshipStmt->execute(array('idsender' => $senderId, 'idreceiver' => $receiverId));

header('Location: ' . $_SERVER['HTTP_REFERER']); //Redirect
