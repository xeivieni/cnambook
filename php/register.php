<?php
/**
 * Created by PhpStorm.
 * User: clem
 * Date: 23/11/2015
 * Time: 23:15
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

$lastName = $_GET["lastName"];
$firstName = $_GET["firstName"];
$birthdayDate = $_GET["birthdayDate"];
$photo = "../img/users/default.jpg";
$email = $_GET["inputEmail"];
$hometown = $_GET["hometown"];
$cityResidency = $_GET["cityResidency"];
$section = $_GET["section"];
$sectionYear = $_GET["sectionYear"];
$promotion = $_GET["promotion"];
$password = $_GET["inputPassword"];
$inscriptionDate = "19/11/15";

$sectionStmt = $conn->prepare('SELECT idsection FROM Section WHERE filiere=:sectionName AND annee =:yearSection');
$sectionStmt->execute(array('sectionName' => $section, 'yearSection' => $sectionYear));
$existingSection = $sectionStmt->fetchAll();

if (count($existingSection) == 1) {
    $idsection = $existingSection[0]["idsection"];
} else {
    $insertSectionStmt = $conn->prepare('INSERT INTO Section(idsection, filiere, annee, promotion) VALUES (NULL, :section, :y, :promo)');
    $insertSectionStmt->execute(array('section' => $section, 'y' => $sectionYear, 'promo' => $promotion));
    $result = $insertSectionStmt->fetchAll();
    $idsection = $result[0];
}

$stmt = $conn->prepare('INSERT INTO Users(nom, prenom, date_naissance, lien_photo, date_inscription, mail,
    ville_origine, ville_residence, idsection, password) VALUES (:lastname, :firstname, :birthdaydate, :photolink, :inscriptiondate,
    :email, :hometown, :cityresidency, :idsection ,MD5(:pass))');

$stmt->execute(array('lastname' => $lastName, 'firstname' => $firstName, 'birthdaydate' => $birthdayDate, 'photolink' =>
    $photo, 'inscriptiondate' => $inscriptionDate, 'email' => $email, 'hometown' => $hometown, 'cityresidency' => $cityResidency
, 'idsection' => $idsection, 'pass' => $password));

$_SESSION['mail'] = $email;
$_SESSION['nom'] = $lastName;
$_SESSION['prenom'] = $firstName;

$stmt3 = $conn->prepare('SELECT * FROM Users WHERE mail=:email AND password = MD5(:pass)');
$stmt3->execute(array('email' => $email, 'pass' => $password));

$result = $stmt3->fetchAll();
$count = $stmt3->rowCount();

if ($count == 1) {
    $_SESSION['id'] = $result[0]["iduser"];
    header("Location: index.php");
} else {
    header("Location: ../html/login.html");
}

header("Location: index.php");