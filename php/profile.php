<?php
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");
$id = $_GET["id"];
$stmt2 = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$stmt2->execute(array('id' => $id));
$owner = $stmt2->fetchAll();
$userid = $_SESSION["id"];
$stmt3 = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$stmt3->execute(array('id' => $userid));
$user = $stmt3->fetchAll();
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

<div class="jumbotron">
    <h1><?php echo $owner[0]["prenom"]." ".$owner[0]["nom"]; ?></h1>

    <div class="row">
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="../img/users/<?php echo $owner[0]["lien_photo"];?>">
            </a>
        </div>
    </div>
    <?php
    if ($userid == $id) {
        echo "vous ne pouvez pas vous ajouter en ami";
        $isfriend = -1;
    }
    else {
        $stmt = $conn->prepare('SELECT * FROM Amis WHERE (iduser1=:iduser1 and iduser2=:iduser2) or (iduser1=:iduser2 and iduser2=:iduser1)');
        $stmt->execute(array('iduser1' => $id, 'iduser2' => $userid));
        $isfriend = $stmt->rowCount();
    }
    ?>
    <?php if($isfriend == 0): ?>
    <form action="friend.php" method="get">
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <button class="btn btn-primary btn-lg" type="submit" role="button" name="id" value="<?php echo $owner[0]["iduser"];?>"><span class="glyphicon glyphicon-plus"></span> Ajouter en ami</button>
        </div>
    </div>
    </form>
    <?php endif ?>

    <?php if($isfriend == 1): ?>
    <form action="unfriend.php" method="get">
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <button class="btn btn-primary btn-lg" type="submit" role="button" name="id" value="<?php echo $owner[0]["iduser"];?>"><span class="glyphicon glyphicon-plus"></span> Retirer des amis</button>
        </div>
    </div>
    </form>
    <?php endif ?>

    <?php foreach($statuts as $statut): ?>
    <?php
        $stmt = $conn->prepare('SELECT * FROM Likes WHERE idstatut=:id');
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