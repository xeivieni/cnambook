<div class="panel panel-default">
    <div class="panel-heading">
        <?php if ($statut["iduser"] == $_SESSION["id"]): ?>
            <a href="remove.php?id=<?php echo $statut["idstatut"];?>"><span class="glyphicon glyphicon-remove pull-right"></span></a>
        <?php endif ?>

        <a href="profile.php?id=<?php echo $statut["iduser"]; ?>"><img
                src="<?php echo $owner[0]["lien_photo"]; ?>" class="img-circle pull-left" width="40" height="40">
            <h4>&nbsp;<?php echo " " . $owner[0]["prenom"] . " " . $owner[0]["nom"]; ?></h4></a>

    </div>
    <div class="panel-body">
        <?php echo $statut["texte"]; ?>
        <div class="clearfix"></div>
        <br>
        <a href="#" data-toggle="modal"
              data-target="#likeslist<?php echo $statut["idstatut"]; ?>"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $likesCount; ?> likes</a>
        &nbsp;
        <a href="#" data-toggle="modal"
              data-target="#commentslist<?php echo $statut["idstatut"]; ?>"><span class="glyphicon glyphicon-comment"></span> <?php echo $commentsCount; ?> Commentaires</a>

        <div class="input-group">
            <div class="input-group-btn">
                <form class="like" action="like.php" method="get">
                    <button class="btn btn-default" type="submit" name="id" value="<?php echo $statut["idstatut"]; ?>">
                        <i class="glyphicon glyphicon-thumbs-up"></i></button>
                </form>
            </div>
            <form action="comment.php" method="get">
                <input type="hidden" name="idstatut" value=<?php echo $statut["idstatut"]; ?> />
                <input type="text" class="form-control" name="texte" id="texte"
                       placeholder="Ajouter un commentaire..">
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="likeslist<?php echo $statut["idstatut"]; ?>" tabindex="-1" role="dialog"
     aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Ils ont liké</h4>
            </div>
            <div class="modal-body">
                <?php
                if (count($likes) == 0) {
                    echo "Personne n'a encore liké ton statut..";
                }
                ?>
                <?php foreach ($likes as $like) : ?>
                    <?php
                    $stmt = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
                    $stmt->execute(array('id' => $like["iduser"]));
                    $name = $stmt->fetchAll();
                    ?>
                    <a href="profile.php?id=<?php echo $name[0]["iduser"]; ?>"><img
                            src="<?php echo $name[0]["lien_photo"]; ?>" class="img-circle pull-left"
                            width="25" height="25">&nbsp;<?php echo " " . $name[0]["prenom"] . " " . $name[0]["nom"]; ?></a>
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

<div class="modal fade" id="commentslist<?php echo $statut["idstatut"]; ?>" tabindex="-1" role="dialog"
     aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Ils ont liké</h4>
            </div>
            <div class="modal-body">
                <?php
                if (count($comments) == 0) {
                    echo "Personne n'a encore commenté ton statut..";
                }
                ?>
                <?php foreach ($comments as $comment) : ?>
                    <?php
                    $stmt = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
                    $stmt->execute(array('id' => $comment["iduser"]));
                    $name = $stmt->fetchAll();
                    ?>
                    <p><a href="profile.php?id=<?php echo $name[0]["iduser"]; ?>"><img
                            src="<?php echo $name[0]["lien_photo"]; ?>" class="img-circle pull-left"
                            width="25" height="25">&nbsp;<?php echo " " . $name[0]["prenom"] . " " . $name[0]["nom"]." : "; ?></a>
                    &nbsp;
                    <?php echo $comment["texte"];?></p>
                    <hr>
                <?php endforeach ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>