<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom -->

    <link href="../css/styles.css" rel="stylesheet">

</head>
<div>
<!-- top nav -->
<div class="wrapper">
    <div class="column col-sm-12 col-xs-12" id="main">
<div class="navbar navbar-blue navbar-static-top">
    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand logo">c</a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
        <form class="navbar-form navbar-left" action="search.php">
            <div class="input-group input-group-sm" style="max-width:500px;">
                <input type="text" class="form-control" placeholder="Search" name="search" id="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
        <ul class="nav navbar-nav">
            <li>
                <a href="#"><i class="glyphicon glyphicon-home"></i> Accueil</a>
            </li>
            <li>
                <a href="#" role="button" data-toggle="modal"><i class="glyphicon glyphicon-education"></i> Groupes</a>
            </li>
            <li>
                <a href="#"><span class="badge">0</span></a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/users/<?php echo $user[0]["lien_photo"];?>" class="profile-image img-circle"></a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php?id=<?php echo $_SESSION['id']; ?>"> Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<!-- /top nav -->
</div>
</div>


<!--

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        &lt;!&ndash;Brand and toggle get grouped for better mobile display &ndash;&gt;
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
                </div>&lt;!&ndash; /input-group &ndash;&gt;
            </form>


            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../img/users/<?php echo $user[0]["lien_photo"];?>" class="profile-image img-circle" width="304" height="236"><?php echo " ".$user[0]["prenom"]." ".$user[0]["nom"];?></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php?id=<?php echo $_SESSION['id']; ?>"> Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>&lt;!&ndash;.navbar-collapse&ndash;&gt;
    </div>&lt;!&ndash;.container-fluid&ndash;&gt;
</nav>-->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>