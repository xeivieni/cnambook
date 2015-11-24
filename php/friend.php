<?php
/**
 * Created by PhpStorm.
 * User: clem
 * Creates friendship between two users.
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Getting ids from session and url
$receiverId = $_GET["id"];
$senderId = $_SESSION["id"];


$createFriendshipStmt = $conn->prepare('INSERT INTO Amis(idamitie, iduser1, iduser2) VALUES (NULL,:idsender,:idreceiver)');
$createFriendshipStmt->execute(array('idsender' => $senderId, 'idreceiver' => $receiverId));

header('Location: ' . $_SERVER['HTTP_REFERER']); ///Redirect