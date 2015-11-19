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
    $inscriptionDate = "19/11/15";


    $stmt2 = $conn->prepare('SELECT idsection FROM Section WHERE nom=:sectionName AND annee =:yearSection');
    $stmt2->execute(array('sectionName' => $section, 'yearSection' => $sectionYear));

    $result = $stmt2->fetchAll();
    $count = $stmt2->rowCount();

    if ($count  == 1) {
        $idsection = $result[0]["idsection"];
    }
    else
    {
        $idsection = 0;
    }

    $stmt = $conn->prepare('INSERT INTO Users(nom, prenom, date_naissance, lien_photo, date_inscription, mail,
    ville_origine, ville_residence, idsection, password) VALUES (:lastname, :firstname, :birthdaydate, :photolink, :inscriptiondate,
    :email, :hometown, :cityresidency, :idsection ,MD5(:pass))');

    $stmt->execute(array('lastname' => $lastName, 'firstname' => $firstName, 'birthdaydate' => $birthdayDate, 'photolink' =>
    $photo, 'inscriptiondate' => $inscriptionDate, 'email' => $email, 'hometown' => $hometown, 'cityresidency' => $cityResidency
    , 'idsection' => $idsection ,'pass' => $password));

    header("Location: index.php");



?>