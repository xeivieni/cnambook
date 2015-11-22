<?php
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");
$id = $_SESSION["id"];
// Dans les versions de PHP antiéreures à 4.1.0, la variable $HTTP_POST_FILES
// doit être utilisée à la place de la variable $_FILES.

$uploaddir = '../img/users/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    $stmt = $conn->prepare('UPDATE Users SET lien_photo=:uploadfile WHERE iduser=:id');
    $stmt->execute(array('id' => $id, 'uploadfile' => $uploadfile));

} else {
    echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>