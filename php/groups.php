<?php
/**
 * Created by PhpStorm.
 * User: clem
 * groups.php
 * Display all the users of either all the groups or only the selected one.
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');

include("config.php");

//Redirect to login page if users isn't logged (no cookie)
if (!isset($_SESSION["mail"])) {
    header("Location: ../html/login.html");
}


//Getting profile owner and user ids from session and URL:
$userId = $_SESSION["id"];

//Database Requests
//Getting all the users
$allUsersStmt = $conn->prepare('SELECT * FROM Users WHERE 1');
$allUsersStmt->execute(array('id' => $userId));
$allUsers = $allUsersStmt->fetchAll();

//Getting all the groups
$allGroupsStmt = $conn->prepare('SELECT * FROM Section GROUP BY filiere');
$allGroupsStmt->execute();
$allGroups = $allGroupsStmt->fetchAll();

//Getting all the years
$allYearsStmt = $conn->prepare('SELECT Section.annee, Section.idsection FROM Section WHERE filiere=:search GROUP BY annee ORDER BY annee DESC ');


//Getting user info
$userInfoStmt = $conn->prepare('SELECT * FROM Users WHERE iduser=:id');
$userInfoStmt->execute(array('id' => $userId));
$user = $userInfoStmt->fetchAll();

//Getting the list of the users for a given group id
$groupUsersListStmt = $conn->prepare('SELECT * FROM Users WHERE idsection=:id');

?>
<?php include("header.php"); ?>

<body>

<div class="container">
    <h1>Parcourez les profils des auditeurs du CNAM</h1>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="user_list.php">All</a></li>
        <?php foreach ($allGroups as $group): ?>
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <?php echo $group["filiere"]; ?> <span class="caret"></span>
                </a>
                <?php
                $allYearsStmt->execute(array('search' => $group["filiere"]));
                $allYears = $allYearsStmt->fetchAll();
                ?>
                <ul class="dropdown-menu">
                    <?php foreach ($allYears as $year): ?>
                        <li><a href="user_list.php?id=<?php echo $year["idsection"]; ?>"><?php echo $year["annee"]; ?>e
                                année</a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>