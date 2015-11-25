<!-- Displays and overview of someone's profile -->

<?php
$areFriendsStmt = $conn->prepare('SELECT * FROM Amis WHERE (iduser1 = :id1 AND iduser2 = :id2) OR (iduser2 = :id1 AND iduser1 = :id2)');
$areFriendsStmt->execute(array('id1' => $groupUser["iduser"], 'id2' => $_SESSION["id"]));
$areFriends = $areFriendsStmt->rowCount();
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php if ($areFriends == 0 && $groupUser["iduser"] != $_SESSION["id"]):?>
            <a href="friend.php?id=<?php echo $groupUser["iduser"];?>"><span class="glyphicon glyphicon-plus pull-right"></span></a>
        <?php elseif ($areFriends == 1 && $groupUser["iduser"] != $_SESSION["id"]):?>
            <a href="unfriend.php?id=<?php echo $groupUser["iduser"];?>"><span class="glyphicon glyphicon-remove pull-right"></span></a>
        <?php endif; ?>
        <a href="profile.php?id=<?php echo $groupUser["iduser"]; ?>"><img src="../img/users/jo.png" class="img-circle pull-left" width="40" height="40">
            <h4>&nbsp;<?php echo $groupUser["prenom"]." ".$groupUser["nom"]?></h4></a>
    </div>
    <div class="panel-body">
        <?php echo "né(e) le ".$groupUser["date_naissance"]; ?>
        <?php echo "habite a ".$groupUser["ville_residence"]; ?>
    </div>
</div>
