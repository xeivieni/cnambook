<?php
/**
 * Created by PhpStorm.
 * User: clem
 * suggest.php
 * This program displays a list of users our session user might know
 */

setlocale(LC_CTYPE, 'fr_FR.UTF-8');
include("config.php");

//Getting user's id from session and URL:
$userId = $_SESSION["id"];

//Getting user info
$userInfoStmt = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$userInfoStmt->execute(array('id' => $userId));
$user = $userInfoStmt->fetchAll();

//Getting users from the same group / same hometown / same city of residency
$usersFromGroupStmt = $conn->prepare('SELECT * FROM Users WHERE idsection=:id or ville_origine = :vo or ville_residence = :vr');
$usersFromGroupStmt->execute(array('id' => $user[0]["idsection"], 'vo' => $user[0]["ville_origine"], 'vr' => $user[0]["ville_residence"]));
$groupUsersList = $usersFromGroupStmt->fetchAll();
$suggestList = array();

foreach ($groupUsersList as $groupUser) {
    //Getting users from the same group
    $areFriendsStmt = $conn->prepare('SELECT * FROM Amis WHERE (iduser1 = :id1 AND iduser2 = :id2) OR (iduser2 = :id1 AND iduser1 = :id2)');
    $areFriendsStmt->execute(array('id1' => $groupUser["iduser"], 'id2' => $userId));
    $notFriendInfo = $areFriendsStmt->fetchAll();
    if (count($notFriendInfo) == 0 && $groupUser["iduser"] != $userId){
        $suggestList[] = $groupUser;
    }
}
?>

<?php if(count($suggestList) > 0) :?>
<div class="well">
    Vous connaissez peut être : <br>


<?php foreach ($suggestList as $suggest) : ?>
    <a href="profile.php?id=<?php echo $suggest["iduser"];?>"><?php echo $suggest["prenom"]." ".$suggest["nom"];?></a>
    <br>
<?php endforeach; ?>
<?php endif; ?>

</div>
