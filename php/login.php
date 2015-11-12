<?php
    session_start();
    include ("config.php");

    if (isset($_GET["username"])){;
        $username = $_GET["username"];
        $password = $_GET["password"];
    }

    $stmt = $conn->prepare('SELECT * FROM users WHERE pseudo =:pseudo AND password = MD5(:pass)');
    $stmt->execute(array('pseudo' => $username, 'pass' => $password));

    $result = $stmt->fetchAll();
    $count = $stmt->rowCount();

    if ($count  == 1) {
        $_SESSION['pseudo'] = $username;
        $_SESSION['id'] =  $result["iduser"];
        header("Location: index.html");
    }
    else{
        header("Location: login.html");
    }

?>