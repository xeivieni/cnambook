<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom -->
    <link href="../css/header.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!--Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                <img alt="Brand" src="../img/hand332.png">
            </a>
        </div>
        <div class="container-fluid">
            <form class="navbar-form navbar-left" role="search" action="../php/search.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tu cherches quoi ?" id="search" name="search" >
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></button>
                        </span>
                </div><!-- /input-group -->
            </form>


            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../img/users/<?php echo $user[0]["lien_photo"];?>" class="img-circle pull-left"></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php?id=<?php echo $_SESSION['id']; ?>"> Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--.navbar-collapse-->
    </div><!--.container-fluid-->
</nav>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>