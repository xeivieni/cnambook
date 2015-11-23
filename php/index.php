<?php
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Redirect to login page if users isn't logged (no cookie)
if (!isset($_SESSION["mail"])) {
    header("Location: ../html/login.html");
}

//Getting profile owner and user ids from session and URL:
$userId = $_SESSION["id"];

//Database Requests
//Getting user info
$userInfoStmt = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$userInfoStmt->execute(array('id' => $userId));
$user = $userInfoStmt->fetchAll();

//Getting the list of status of the user's friends
$statusListStmt = $conn->prepare('SELECT Statut.* FROM Amis, Statut WHERE (Amis.iduser1=:id AND Statut.iduser=Amis.iduser2) OR (Amis.iduser2=:id AND Statut.iduser=Amis.iduser1) ORDER BY Statut.heure DESC');
$statusListStmt->execute(array('id' => $userId));
$statusList = $statusListStmt->fetchAll();

//Getting the list of the likes for a given status id
$likesListStmt = $conn->prepare('SELECT * FROM Likes WHERE idstatut=:id');

//Getting the list of the comments for a given status id
$commentsListStmt = $conn->prepare('SELECT * FROM Commentaires WHERE idstatut=:id');

?>
<?php include("header.php"); ?>
<body>

<div class="col-lg-8 col-lg-offset-2">
    <div class="well">
        <form class="form-horizontal" action="status.php" role="form">
            <h4>Quoi de neuf ?</h4>

            <div class="form-group" style="padding:14px;">
                <textarea id="statut" name="statut" class="form-control"
                          placeholder="Postez un nouveau statut..."></textarea>
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


<?php foreach ($statusList as $status): ?>
    <?php
    $likesListStmt->execute(array('id' => $status["idstatut"]));
    $userInfoStmt->execute(array('id' => $status["iduser"]));
    $commentsListStmt->execute(array('id' => $status["idstatut"]));
    $likes = $likesListStmt->fetchAll();
    $comments = $commentsListStmt->fetchAll();
    $likesCount = $likesListStmt->rowCount();
    $commentsCount = $commentsListStmt->rowCount();
    $owner = $userInfoStmt->fetchAll();
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