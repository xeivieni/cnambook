<?php
    setlocale(LC_CTYPE, 'fr_FR.UTF-8');
    session_start();
    include ("config.php");
    $idreceiver = $_GET["id"];
    $idsender = $_SESSION["id"];

    $stmt2 = $conn->prepare('DELETE FROM Amis WHERE (iduser2=:idsender and iduser1=:idreceiver) or (iduser1=:idsender and iduser2=:idreceiver)');
    $stmt2->execute(array('idsender' => $idsender, 'idreceiver' => $idreceiver));


    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>