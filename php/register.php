<?php
    session_start();
    include ("config.php");

    $lastName = $_GET["lastName"];
    $firstName = $_GET["firstName"];
    $birthdayDate = $_GET["birthdayDate"];
    $photo = $_GET["photo"];
    $email = $_GET["inputEmail"];
    $hometown = $_GET["hometown"];
    $cityResidency = $_GET["cityResidency"];
    $section = $_GET["section"];
    $sectionYear = $_GET["sectionYear"];
    $password = $_GET["inputPassword"];
    $inscriptioDate = "19/11/15";

    $stmt = $conn->prepare('INSERT INTO Users(nom, prenom, date_naissance, lien_photo, date_inscription, mail,
    ville_origine, ville_residence, password) VALUES (:lastname, :firstname, :birthdaydate, :photolink, :inscriptiondate,
    :email, :hometown, :cityresidency, MD5(:pass))');

    $stmt->execute(array('lastname' => $lastName, 'firstname' => $firstName, 'birthdaydate' => $birthdayDate, 'photolink' =>
    $photo, 'inscriptiondate' => $inscriptioDate, 'email' => $email, 'hometown' => $hometown, 'cityresidency' => $cityResidency
    , 'pass' => $password));

    header("Location: index.php");



?>