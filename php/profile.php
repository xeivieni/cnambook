<?php
    session_start();
    include ("config.php");
    $id = $_GET["id"];
    $stmt = $conn->prepare('SELECT * FROM Statut WHERE iduser=:id');
    $stmt->execute(array('id' => $id));
    $result = $stmt->fetchAll();
    print_r($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
            echo $nom;
        ?>
    </title>
</head>
<body>

</body>
</html>