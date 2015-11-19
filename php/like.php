<?php
    session_start();
    include ("config.php");
    $idstatut = $_GET["id"];
    $iduser = $_SESSION["id"];

    $stmt = $conn->prepare('INSERT INTO `Compteur`(`idlike`, `date`, `heure`, `iduser`, `idstatut`) VALUES (NULL,CURRENT_DATE,CURRENT_TIMESTAMP, :iduser,:idstatut)');

    $stmt->execute(array('iduser' => $iduser, 'idstatut' => $idstatut));
    exit();
?>