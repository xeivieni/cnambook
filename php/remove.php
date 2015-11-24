<?php
/**
 * Created by PhpStorm.
 * User: clem
 * remove.php
 * This program will delete the status corresponding to the given status id
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Get status id
$idstatut = $_GET["id"];


$removeStatusStmt = $conn->prepare('DELETE FROM Statut WHERE idstatut=:idstatut');
$removeStatusStmt->execute(array('idstatut' => $idstatut));


header('Location: ' . $_SERVER['HTTP_REFERER']); //Redirect
