<?php
    session_start();
    include ("config.php");

    if (isset($_GET["inputEmail"])){
        $email = $_GET["inputEmail"];
        $password = $_GET["inputPassword"];
    }

    $stmt = $conn->prepare('SELECT * FROM Users WHERE mail=:email AND password = MD5(:pass)');
    $stmt->execute(array('email' => $email, 'pass' => $password));

    $result = $stmt->fetchAll();
    $count = $stmt->rowCount();

    if ($count  == 1) {
        $_SESSION['mail'] = $result[0]["mail"];
        $_SESSION['nom'] = $result[0]["nom"];
        $_SESSION['prenom'] = $result[0]["prenom"];
        $_SESSION['id'] =  $result[0]["iduser"];
        header("Location: ../index.php");
    }
    else{
        header("Location: ../html/login.html");
    }

?>