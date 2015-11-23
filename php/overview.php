<?php
/**
 * Created by PhpStorm.
 * User: clem
 * Date: 23/11/2015
 * Time: 21:26
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
            <!--<a href="unfriend.php?id=<?php //echo $student["iduser"];?>"><span class="glyphicon glyphicon-remove pull-right"></span></a>-->
            <a href=""><span class="glyphicon glyphicon-remove pull-right"></span></a>


        <a href="profile.php?id=<?php echo $groupUser["iduser"]; ?>"><img src="../img/users/jo.png" class="img-circle pull-left" width="40" height="40">
            <h4>&nbsp;<?php echo $groupUser["prenom"]." ".$groupUser["nom"]?></h4></a>
    </div>
    <div class="panel-body">
        <?php echo "né(e) le ".$groupUser["date_naissance"]; ?>
        <?php echo "habite a ".$groupUser["ville_residence"]; ?>
    </div>
</div>

