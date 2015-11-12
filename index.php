<?php
    session_start();
	if (!isset($_SESSION["mail"])){
		header("Location: html/login.html");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Cnambook</title>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!--Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="img/hand332.png">
            </a>
        </div>
        <div class="container-fluid">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="html/profile.html">Profile</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Settings</a></li>
                        <li><a href="html/help.html">Help</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="php/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--.navbar-collapse-->
    </div><!--.container-fluid-->
</nav>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>