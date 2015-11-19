<?php
    session_start();
    include ("config.php");

	if (!isset($_SESSION["mail"])){
		header("Location: ../html/login.html");
	}
    $id = $_SESSION["id"];
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <title>Cnambook</title>

</head>
<header>
    <?php include("header.php"); ?>
</header>
<body>

<?php
$stmt1 = $conn->prepare('SELECT Statut.* FROM Amis, Statut WHERE Amis.iduser1=:id AND Statut.iduser=Amis.iduser2');
$stmt2= $conn->prepare('SELECT Statut.* FROM Amis, Statut WHERE Amis.iduser2=:id AND Statut.iduser=Amis.iduser1');
$stmt1->execute(array('id' => $id));
$stmt2->execute(array('id' => $id));
$status1 = $stmt1->fetchAll();
$status2 = $stmt2->fetchAll();
$status = array_merge($status1, $status2);

?>



<?php foreach($status as $statut): ?>
    <?php
    $stmt = $conn->prepare('SELECT * FROM Compteur WHERE idstatut=:id');
    $stmt->execute(array('id' => $statut["idstatut"]));
    $likes = $stmt->fetchAll();
    $count = $stmt->rowCount();
    $stmt2 = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
    $stmt2->execute(array('id' => $statut["iduser"]));
    $owner = $stmt2->fetchAll();

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