<?php
    setlocale(LC_CTYPE, 'fr_FR.UTF-8');
    session_start();
    include ("config.php");
    $idreceiver = $_GET["id"];
    $idsender = $_SESSION["id"];

    $stmt2 = $conn->prepare('INSERT INTO Amis(idamitie, iduser1, iduser2) VALUES (NULL,:idsender,:idreceiver)');
    $stmt2->execute(array('idsender' => $idsender, 'idreceiver' => $idreceiver));


    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>