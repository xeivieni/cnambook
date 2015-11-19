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

    <div class="panel panel-default">
        <div class="panel-heading"><img src="//placehold.it/50x50" class="img-circle"><h4><a><?php echo $owner[0]["nom"]; echo " "; echo $owner[0]["prenom"];?></a></h4></div>
        <div class="panel-body">
            <?php echo $statut["texte"]; ?>
            <div class="clearfix"></div>
            <hr>

            <p> <?php echo $count; ?> likes<a href="#" data-toggle="modal"
                                              data-target="#likes<?php echo $statut["idstatut"]?>">Voir les amis qui ont liké</a></p>

            <hr>
            <form>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button class="btn btn-default"><i class="glyphicon glyphicon-thumbs-up"></i></button>
                    </div>
                    <input type="text" class="form-control" placeholder="Add a comment..">
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="basicModal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">Ils ont liké</h4>
                </div>
                <div class="modal-body">
                    <?php foreach($likes as $like){
                        $stmt = $conn->prepare('SELECT nom, prenom FROM Users WHERE iduser=:id');
                        $stmt->execute(array('id' => $like["iduser"]));
                        $name = $stmt->fetchAll();
                        echo $name[0]["nom"];
                        echo " ";
                        echo $name[0]["prenom"];
                        echo "<br>";
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">Ils ont liké</h4>
                </div>
                <div class="modal-body">
                    <?php foreach($likes as $like){
                        $stmt = $conn->prepare('SELECT nom, prenom FROM Users WHERE iduser=:id');
                        $stmt->execute(array('id' => $like["iduser"]));
                        $name = $stmt->fetchAll();
                        echo $name[0]["nom"];
                        echo " ";
                        echo $name[0]["prenom"];
                        echo "<br>";
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>



</body>
</html>