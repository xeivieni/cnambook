<?php
    session_start();
    include ("config.php");
    $id = $_GET["id"];
    $stmt = $conn->prepare('SELECT * FROM Statut WHERE iduser=:id');
    $stmt->execute(array('id' => $id));
    $stmt2 = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
    $stmt2->execute(array('id' => $id));
    $statuts = $stmt->fetchAll();
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


<body>
<div class="panel panel-default">
    <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
    <div class="panel-body">
        <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
        <div class="clearfix"></div>
        <hr>

        <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>

        <hr>
        <form>
            <div class="input-group">
                <div class="input-group-btn">
                    <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                </div>
                <input type="text" class="form-control" placeholder="Add a comment..">
            </div>
        </form>

    </div>
</div>


</body>
</html>