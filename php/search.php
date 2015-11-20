<?php
    setlocale(LC_CTYPE, 'fr_FR.UTF-8');
    session_start();
    include ("config.php");

    $search = $_GET["search"];

    $stmt = $conn->prepare('SELECT *, match(prenom, nom) against (:search IN BOOLEAN MODE) as score from `Users` HAVING score > 0 ORDER by score DESC');
    $stmt->execute(array('search' => $search));

    $results = $stmt->fetchAll();
    $count = $stmt->rowCount();

    if ($count == 1){
        header('location:profile.php?id='.$results[0]['iduser']);
    }
    else{
        echo "several results";
    }

?>