<?php
    session_start();
    include ("config.php");

    if (isset($_GET["inputEmail"])){;
        $email = $_GET["inputEmail"];
        $password = $_GET["inputPassword"];
    }

    $stmt = $conn->prepare('SELECT * FROM users WHERE email=:email AND password = MD5(:pass)');
    $stmt->execute(array('email' => $email, 'pass' => $password));

    $result = $stmt->fetchAll();
    $count = $stmt->rowCount();

    if ($count  == 1) {
        $_SESSION['pseudo'] = $result["username"];
        $_SESSION['id'] =  $result["iduser"];
        header("Location: ../index.html");
    }
    else{
        header("Location: ../html/login.html");
    }

?>