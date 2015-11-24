<?php
/**
 * Created by PhpStorm.
 * User: clem
 * status.php
 * This program posts a new status with the given text for session user
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Getting status from form and id from session
$status = $_GET["statut"];
$userId = $_SESSION["id"];

//Inserting a new status with the right information
$addStatusStmt = $conn->prepare('INSERT INTO Statut(idstatut, texte, heure, iduser) VALUES (NULL,:statut,CURRENT_TIMESTAMP, :iduser)');
$addStatusStmt->execute(array('iduser' => $userId, 'statut' => $status));

header('Location: ' . $_SERVER['HTTP_REFERER']); //Redirect