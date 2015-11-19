<?php
session_start();
include("config.php");
$id = $_GET["id"];
$stmt2 = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$stmt2->execute(array('id' => $id));
$owner = $stmt2->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
        echo $owner[0]["prenom"];
        echo " ";
        echo $owner[0]["nom"];
        ?>
    </title>
</head>
<header>
    <?php include("header.php"); ?>
</header>

<?php
$stmt = $conn->prepare('SELECT * FROM Statut WHERE iduser=:id ORDER BY Statut.date DESC');
$stmt->execute(array('id' => $id));
$statuts = $stmt->fetchAll();
?>




<body>

<?php foreach($statuts as $statut): ?>
    <?php
        $stmt = $conn->prepare('SELECT * FROM Compteur WHERE idstatut=:id');
        $stmt->execute(array('id' => $statut["idstatut"]));
        $likes = $stmt->fetchAll();
        $count = $stmt->rowCount();
    ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <?php include("post.php"); ?>

        </div>
    </div>

</div>


<?php endforeach ?>



</body>
</html>