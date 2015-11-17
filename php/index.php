<?php
    session_start();
	if (!isset($_SESSION["mail"])){
		header("Location: ../html/login.html");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <title>Cnambook</title>

</head>
<header>
    <?php include("header.php"); ?>
</header>

<body>

</body>
</html>