<?php
    setlocale(LC_CTYPE, 'fr_FR.UTF-8');
    session_start();
    include ("config.php");
    $idstatut = $_GET["id"];
    $iduser = $_SESSION["id"];

    $stmt = $conn->prepare('SELECT * FROM Compteur WHERE iduser=:iduser and idstatut=:idstatut');
$stmt->execute(array('iduser' => $iduser, 'idstatut' => $idstatut));
$count = $stmt->rowCount();
if ($count == 0){
$stmt2 = $conn->prepare('INSERT INTO `Compteur`(`idlike`, `date`, `heure`, `iduser`, `idstatut`) VALUES (NULL,CURRENT_DATE,CURRENT_TIMESTAMP, :iduser,:idstatut)');
$stmt2->execute(array('iduser' => $iduser, 'idstatut' => $idstatut));
}
else{
$stmt3 = $conn->prepare('DELETE FROM `Compteur` WHERE `iduser`=:iduser AND `idstatut`=:idstatut');
$stmt3->execute(array('iduser' => $iduser, 'idstatut' => $idstatut));
}


header('Location: ' . $_SERVER['HTTP_REFERER']);

?>