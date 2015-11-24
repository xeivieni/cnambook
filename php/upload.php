<?php
/**
 * Created by PhpStorm.
 * User: clem
 * upload.php
 * Uploads a picture in the file system to set as profile picture for the given user (session user)
 */

setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Getting user's id from cookies
$id = $_SESSION["id"];

//Specification of the path to img/users folder
$uploaddir = '../img/users/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']); //We keep the default image name

//Uploading file
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    //If upload is successful : Add the new file name in the database
    $stmt = $conn->prepare('UPDATE Users SET lien_photo=:uploadfile WHERE iduser=:id');
    $stmt->execute(array('id' => $id, 'uploadfile' => $uploadfile));

} else {
    echo "Attaque potentielle par téléchargement de fichiers.";
}
header('Location: ' . $_SERVER['HTTP_REFERER']); //Redirect