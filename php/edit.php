<?php
/**
 * Created by PhpStorm.
 * User: clem
 * edit.php
 * Handling the results of the form to edit user info
 * First step : Getting the input values which are different to the old values
 * Next : Test whether section is the same, is different or exists
 * Finally : Update profile information with the new values
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Getting the values of the parameters entered
$inputValues["nom"] = $_GET["lastName"];
$inputValues["prenom"] = $_GET["firstName"];
$inputValues["date_naissance"] = $_GET["birthdayDate"];
$inputValues["mail"] = $_GET["inputEmail"];
$inputValues["ville_origine"] = $_GET["hometown"];
$inputValues["ville_residence"] = $_GET["cityResidency"];
$section["filiere"] = $_GET["section"];
$section["promotion"] = $_GET["promotion"];
$section["annee"] = $_GET["sectionYear"];

//Creating an empty array which will contain the mixed
//values of old ones if unchanged or new ones if entered
$newValues = array();

//Request for old values
$userInfoStmt = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$userInfoStmt->execute(array('id' => $_SESSION["id"]));
$oldValues = $userInfoStmt->fetchAll();

//Getting the section corresponding to the given section id
$sectionFromIdStmt = $conn->prepare('SELECT * FROM Section WHERE idsection=:id');
$sectionFromIdStmt->execute(array('id' => $oldValues[0]["idsection"]));
$oldSection = $sectionFromIdStmt->fetchAll();

foreach ($section as $key => $value) {
    if ($value == null){
        $section[$key] = $oldSection[0][$key];
    }
}

//Getting the section corresponding to the given section, promotion and year if exists
$sectionFromInfoStmt = $conn->prepare('SELECT idsection FROM Section WHERE filiere=:sectionName AND annee =:yearSection AND Section.promotion= :promo');
$sectionFromInfoStmt->execute(array('sectionName' => $section["filiere"], 'yearSection' => $section["annee"], 'promo' => $section["promotion"]));
$newSection = $sectionFromInfoStmt->fetchAll();

//If the new section exists add the section id to the new values else create it
if (count($newSection) == 1) {
    $newValues["idsection"] = $newSection[0]["idsection"];
} else {
    $insertSectionStmt = $conn->prepare('INSERT INTO Section(idsection, filiere, annee, promotion) VALUES (NULL, :section, :y, :promo)');
    $insertSectionStmt->execute(array('section' => $section["filiere"], 'y' => $section["annee"], 'promo' => $section["promotion"]));
    $newSectionId = $insertSectionStmt->fetchAll();
    $newValues["idsection"] = $$newSectionId[0]["idsection"];
}

foreach ($inputValues as $key => $value) {
    if ($value == null) {
        $newValues[$key] = $oldValues[0][$key];
    } else {
        $newValues[$key] = $value;
    }
}

//Updating the database
$updateUserInfoStmt = $conn->prepare('UPDATE Users SET nom = :fn, prenom = :ln, date_naissance = :bd, mail = :email, ville_origine = :cb, ville_residence = :cr, idsection =:ids WHERE iduser=:id');
$updateUserInfoStmt->execute(array('fn' => $newValues["nom"], 'ln' => $newValues["prenom"], 'bd' => $newValues["date_naissance"], 'email' => $newValues["mail"], 'cb' => $newValues["ville_origine"], 'ids' => $newValues["idsection"], 'cr' => $newValues["ville_residence"], 'id' => $_SESSION["id"]));


header('Location: ' . $_SERVER['HTTP_REFERER']); ///Redirect
