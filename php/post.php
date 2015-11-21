<div class="panel panel-default">
    <div class="panel-heading">
        <a href="profile.php?id=<?php echo $statut["iduser"]; ?>"><img
                src="../img/users/<?php echo $owner[0]["lien_photo"]; ?>" class="img-circle" width="40" height="40">
            <h4><?php echo " " . $owner[0]["prenom"] . " " . $owner[0]["nom"]; ?></h4></a></div>
    <div class="panel-body">
        <?php echo $statut["texte"]; ?>
        <div class="clearfix"></div>
        <hr>
        <p><a href="#" data-toggle="modal"
              data-target="#likeslist<?php echo $statut["idstatut"]; ?>"> <?php echo $count; ?> likes</a></p>


        <div class="input-group">
            <div class="input-group-btn">
                <form class="like" action="like.php" method="get">
                    <button class="btn btn-default" type="submit" name="id" value="<?php echo $statut["idstatut"]; ?>">
                        <i class="glyphicon glyphicon-thumbs-up"></i></button>
                </form>
            </div>
            <form action="comment.php" method="get">
                <input type="text" class="form-control" name="infos[]" id="comment"
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
                            src="../img/users/<?php echo $name[0]["lien_photo"]; ?>" class="img-circle pull-left"
                            width="25" height="25"><?php echo " " . $name[0]["prenom"] . " " . $name[0]["nom"]; ?></a>
                <?php endforeach ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>