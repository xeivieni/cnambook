<?
include "config.php";

include "groups.php";
if (!isset($_GET["id"])){
    $allGroupUsersStmt = $conn->prepare('SELECT * FROM Users WHERE 1');
    $allGroupUsersStmt->execute();
    $groupUsersList = $allGroupUsersStmt->fetchAll();
}
else {
    $groupUsersListStmt->execute(array('id' => $_GET["id"]));
    $groupUsersList = $groupUsersListStmt->fetchAll();
}
?>

<div class="container">
    <? foreach ($groupUsersList as $groupUser){
        include "overview.php";
    }

    ?>

</div>
