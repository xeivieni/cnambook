<?php
/**
 * Created by PhpStorm.
 * User: clem
 * search.php
 * After clicking the search button, the requested keyword(s)
 * is(are) searched in the database (for name and first name of users)
 */
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
session_start();
include("config.php");

//Getting the searched keywords
$search = $_GET["search"];

$searchStmt = $conn->prepare('SELECT *, match(prenom, nom) against (:search IN BOOLEAN MODE) as score from `Users` HAVING score > 0 ORDER by score DESC');
$searchStmt->execute(array('search' => $search));
$results = $searchStmt->fetchAll();

if (count($results) == 1) {
    //If only one user match the search terms, redirect to the user's profile
    header('location:profile.php?id=' . $results[0]['iduser']);
}
else
{
    if(count($results) == 0) {
        echo"<br>";
        echo "<h2>"."No result for "."\"".$search."\""."</h2>";
    }
    else {
        echo "<h2>"."Too many results"."</h2>";
        echo"<br>";
    }
}
