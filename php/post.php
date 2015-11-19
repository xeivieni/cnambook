
<div class="panel panel-default">
    <div class="panel-heading"><a href="profile.php?id=<?php echo $statut["iduser"]; ?>"><img src="../img/users/jo.png" class="img-circle pull-left"><h4><?php echo " "; echo $owner[0]["nom"]; echo " "; echo $owner[0]["prenom"];?></h4></a></div>
    <div class="panel-body">
        <?php echo $statut["texte"]; ?>
        <div class="clearfix"></div>
        <hr>

        <p><a href="#" data-toggle="modal"
              data-target="#likes<?php echo $statut["idstatut"]?>"> <?php echo $count; ?> likes</a></p>

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