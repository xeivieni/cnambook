<?php
/**
 * Created by PhpStorm.
 * User: clem
 * Program to connect to the system (checks if users credentials are correct, creates the cookie and logs the user)
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

if (isset($_GET["inputEmail"])) {
    $email = $_GET["inputEmail"];
    $password = $_GET["inputPassword"];
}

$checkUserStmt = $conn->prepare('SELECT * FROM Users WHERE mail=:email AND password = MD5(:pass)');
$checkUserStmt->execute(array('email' => $email, 'pass' => $password));
$result = $checkUserStmt->fetchAll();

if (count($result) == 1) {
    //Adding some useful info about the user to the cookie.
    $_SESSION['mail'] = $result[0]["mail"];
    $_SESSION['nom'] = $result[0]["nom"];
    $_SESSION['prenom'] = $result[0]["prenom"];
    $_SESSION['id'] = $result[0]["iduser"];
    //Redirect to main website page
    header("Location: index.php");
} else {
    //Credentials where wrong, back to the login page
    header("Location: ../html/login.html");
}
