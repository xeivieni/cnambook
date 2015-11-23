<?php
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Redirect to login page if users isn't logged (no cookie)
if (!isset($_SESSION["mail"])) {
    header("Location: ../html/login.html");
}

//Getting profile owner and user ids from session and URL:
$ownerId = $_GET["id"];
$userId = $_SESSION["id"];

//Database Requests
//Getting profile owner info
$UserInfoStmt = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$userInfoStmt->execute(array('id' => $ownerId));
$owner = $userInfoStmt->fetchAll();

//Getting user info
$userInfoStmt->execute(array('id' => $userId));
$user = $userInfoStmt->fetchAll();

//Getting the list of all the status of the owner
$statusListStmt = $conn->prepare('SELECT * FROM Statut WHERE iduser=:id ORDER BY Statut.heure DESC');
$statusListStmt->execute(array('id' => $ownerId));
$statusList = $statusListStmt->fetchAll();

//Getting the list of all the friends of the owner
$friendsStmt = $conn->prepare('SELECT Users.* FROM Amis, Users WHERE (Amis.iduser2=:id AND Users.iduser=Amis.iduser1) OR (Amis.iduser1=:id AND Users.iduser=Amis.iduser2)');
$friendsStmt->execute(array('id' => $ownerId));
$friends = $friendsStmt->fetchAll();

//Getting the list of the likes for a given status id
$likesListStmt = $conn->prepare('SELECT * FROM Likes WHERE idstatut=:id');

//Getting the list of the comments for a given status id
$commentsListStmt = $conn->prepare('SELECT * FROM Commentaires WHERE idstatut=:id');

if ($userId == $ownerId) {
    //User is watching is own profile
    $isFriend = -1;
} else {
    //Getting the relationship between user and owner
    $isFriendStmt = $conn->prepare('SELECT * FROM Amis WHERE (iduser1=:iduser1 AND iduser2=:iduser2) OR (iduser1=:iduser2 AND iduser2=:iduser1)');
    $isFriendStmt->execute(array('iduser1' => $ownerId, 'iduser2' => $userId));
    $isFriend = $isFriendStmt->rowCount();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php echo $owner[0]["prenom"] . " " . $owner[0]["nom"]; ?>
    </title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
<?php include("header.php"); ?>

<div class="jumbotron">
    <div class="row">
        <div class="col-xs-6 col-md-9">
            <h1><?php echo $owner[0]["prenom"] . " " . $owner[0]["nom"]; ?></h1>
            <br>

            <p>
                <span class="glyphicon glyphicon-home"></span> Habite à : <?php echo $owner[0]["ville_residence"]; ?>
                <br>
                <span class="glyphicon glyphicon-gift"></span> Né(e) le : <?php echo $owner[0]["date_naissance"]; ?>
                <br>
                <a href="#" data-toggle="modal" data-target="#friendslist<?php echo $owner[0]["iduser"]; ?>"><span
                        class="glyphicon glyphicon-user"></span> <?php echo count($friends); ?> amis</a>
            </p>

            <?php if ($isFriend == 0): ?>
                <form action="friend.php" method="get">
                    <button class="btn btn-primary btn-lg" type="submit" role="button" name="id"
                            value="<?php echo $owner[0]["iduser"]; ?>"><span class="glyphicon glyphicon-plus"></span>
                        Ajouter en ami
                    </button>
                </form>
            <?php endif ?>


            <?php if ($isFriend == 1): ?>
                <form action="unfriend.php" method="get">
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <button class="btn btn-primary btn-lg" type="submit" role="button" name="id"
                                    value="<?php echo $owner[0]["iduser"]; ?>"><span
                                    class="glyphicon glyphicon-plus"></span>
                                Retirer des amis
                            </button>
                        </div>
                    </div>
                </form>
            <?php endif ?>
        </div>
        <div class="col-xs-6 col-md-3">
            <a href="#" data-toggle="modal"
               data-target="#<?php if ($isFriend == -1) {
                   echo "photoupdate";
               } else if ($isFriend == 1) {
                   echo "photodisplay";
               } ?>" class="thumbnail">
                <img src="<?php echo $owner[0]["lien_photo"]; ?>" width="320" height="320">
            </a>

        </div>
    </div>
    <hr>

    <?php foreach ($statusList as $status): ?>
        <?php
        $likesListStmt->execute(array('id' => $status["idstatut"]));
        $commentsListStmt->execute(array('id' => $status["idstatut"]));
        $likes = $likesListStmt->fetchAll();
        $comments = $commentsListStmt->fetchAll();
        $likesCount = $likesListStmt->rowCount();
        $commentsCount = $commentsListStmt->rowCount();
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php include("post.php"); ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div> <!--Jumbotron-->

<div class="modal fade" id="photodisplay" tabindex="-1" role="dialog"
     aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img src="<?php echo $owner[0]["lien_photo"]; ?>" class="img-responsive">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="photoupdate" tabindex="-1" role="dialog"
     aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Le type d'encodage des données, enctype, DOIT être spécifié comme ce qui suit -->
                <form enctype="multipart/form-data" action="upload.php" method="post">
                    <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="300000000000"/>
                    <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                    Envoyez ce fichier : <input name="userfile" type="file"/>
                    <input type="submit" value="Envoyer le fichier"/>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="friendslist<?php echo $owner[0]["iduser"]; ?>" tabindex="-1" role="dialog"
     aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <?php if ($isFriend == -1): ?>
                    <h4 class="modal-title" id="myModalLabel">Vos amis</h4>
                <?php else: ?>
                    <h4 class="modal-title" id="myModalLabel">Les amis de <?php echo $owner["prenom"]; ?></h4>
                <?php endif ?>
            </div>
            <div class="modal-body">
                <?php
                if (count($friends) == 0) {
                    echo $owner["prenom"] . " n'a pas encore d'amis..";
                }
                ?>
                <?php foreach ($friends as $friend) : ?>
                    <a href="profile.php?id=<?php echo $friend[0]["iduser"]; ?>"><img
                            src="<?php echo $friend["lien_photo"]; ?>" class="img-circle pull-left"
                            width="25" height="25">&nbsp;<?php echo " " . $friend["prenom"] . " " . $friend["nom"]; ?>
                    </a>
                    <br>
                    <br>
                <?php endforeach ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</body>
<script src="../js/custom.js"></script>
</html>