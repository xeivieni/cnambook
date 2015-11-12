<?php
    session_start();
    include ("config.php");

    if (isset($_GET["inputEmail"])){;
        $email = $_GET["inputEmail"];
        $password = $_GET["inputPassword"];
    }

    $stmt = $conn->prepare('SELECT * FROM users WHERE mail=:email AND password = MD5(:pass)');
    $stmt->execute(array('email' => $email, 'pass' => $password));

    $result = $stmt->fetchAll();
    $count = $stmt->rowCount();

    if ($count  == 1) {
        $_SESSION['pseudo'] = $result["username"];
        $_SESSION['id'] =  $result["iduser"];
        echo "found";
        //header("Location: ../index.html");
    }
    else{
        echo "not found";
//        header("Location: ../html/login.html");
    }

?>