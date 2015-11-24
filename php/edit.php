<?php
/**
 * Created by PhpStorm.
 * User: clem
 * edit.php
 * Handling the results of the form to edit user info
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
$section = $_GET["section"];
$promotion = $_GET["Promotion"];
$sectionYear = $_GET["sectionYear"];

//Creating an empty array which will contain the mixed
//values of old ones if unchanged or new ones if entered
$newValues = array();

//Request for old values
$userInfoStmt = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$userInfoStmt->execute(array('id' => $_SESSION["id"]));
$oldValues = $userInfoStmt->fetchAll();

//Getting the section corresponding to the given section, promotion and year if exists
$sectionStmt = $conn->prepare('SELECT idsection FROM Section WHERE filiere=:sectionName AND annee =:yearSection AND Section.promotion= :promo');
$sectionStmt->execute(array('sectionName' => $section, 'yearSection' => $sectionYear, 'promo' => $promotion));
$result = $sectionStmt->fetchAll();

if (count($result) == 1) {
    $inputValues["idsection"] = $result[0]["idsection"];
} else {
    $insertSectionStmt = $conn->prepare('INSERT INTO Section(idsection, filiere, annee, promotion) VALUES (NULL, :section, :y, :promo)');
    $insertSectionStmt->execute(array('section' => $section, 'y' => $sectionYear, 'promo' => $promotion));
    $result = $insertSectionStmt->fetch(PDO::FETCH_ASSOC);
    $inputValues["idsection"] = $result[0];
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
