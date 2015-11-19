<?php
session_start();
include("config.php");
$id = $_GET["id"];
$stmt2 = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$stmt2->execute(array('id' => $id));
$infos = $stmt2->fetchAll();
$nom = $infos[0]["nom"];
$prenom = $infos[0]["prenom"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
        echo $prenom;
        echo " ";
        echo $nom;
        ?>
    </title>
</head>
<header>
    <?php include("header.php"); ?>
</header>

<?php
$stmt = $conn->prepare('SELECT * FROM Statut WHERE iduser=:id');
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
<div class="panel panel-default">
    <div class="panel-heading"><a href="#" class="pull-right">Modifier</a><img src="//placehold.it/50x50" class="img-circle"><h4><?php echo $nom; echo " "; echo $prenom;?></h4></div>
    <div class="panel-body">
        <?php echo $statut["texte"]; ?>
        <div class="clearfix"></div>
        <hr>

        <p> <?php echo $count; ?> likes<a href="#" data-toggle="modal"
                         data-target="#basicModal">  Voir les amis qui ont liké</a></p>

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