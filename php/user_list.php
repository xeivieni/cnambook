<?php
/**
 * Created by PhpStorm.
 * User: clem
 * user_list.php
 * This program displays a list of users studying in the given promotion
 */

setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Header for the groups navigation
include "groups.php";

if (!isset($_GET["id"])){
    //No groups selected : getting all users
    $allGroupUsersStmt = $conn->prepare('SELECT * FROM Users WHERE 1');
    $allGroupUsersStmt->execute();
    $groupUsersList = $allGroupUsersStmt->fetchAll();
}
else {
    //Get only the users who have the corresponding id for the section column
    $groupUsersListStmt->execute(array('id' => $_GET["id"]));
    $groupUsersList = $groupUsersListStmt->fetchAll();
}
?>

<div class="container">
    <? foreach ($groupUsersList as $groupUser){
        //For each user in the group, display an overview of the user's profile
        include "overview.php";
    }

    ?>

</div>
