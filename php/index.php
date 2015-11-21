<?php
    setlocale(LC_CTYPE, 'fr_FR.UTF-8');
    session_start();
    include ("config.php");

	if (!isset($_SESSION["mail"])){
		header("Location: ../html/login.html");
	}
    $id = $_SESSION["id"];
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $stmt2 = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$stmt2->execute(array('id' => $id));
$user = $stmt2->fetchAll();
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


<body>
<?php include("header.php"); ?>

<?php
$stmt1 = $conn->prepare('SELECT Statut.* FROM Amis, Statut WHERE (Amis.iduser1=:id AND Statut.iduser=Amis.iduser2) OR (Amis.iduser2=:id AND Statut.iduser=Amis.iduser1) ORDER BY Statut.date DESC');

$stmt1->execute(array('id' => $id));

$status = $stmt1->fetchAll();


?>
<div class="col-lg-8 col-lg-offset-2">
    <div class="well">
        <form class="form-horizontal" action="status.php" role="form">
            <h4>Quoi de neuf ?</h4>

            <div class="form-group" style="padding:14px;">
                <textarea id="statut" name="statut" class="form-control" placeholder="Postez un nouveau statut..."></textarea>
            </div>
            <button class="btn btn-primary pull-right" type="submit">Post</button>
            <ul class="list-inline">
                <li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>
                <li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
                <li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li>
            </ul>
        </form>
    </div>
</div>


<?php foreach($status as $statut): ?>
<?php
    $stmt = $conn->prepare('SELECT * FROM Likes WHERE idstatut=:id');
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