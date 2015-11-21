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
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-home"></i> Accueil</a>
                        </li>
                        <li>
                            <a href="#" role="button" data-toggle="modal"><i class="glyphicon glyphicon-education"></i>
                                Groupes</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge">0</span></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"><img
                                    src="../img/users/<?php echo $user[0]["lien_photo"]; ?>"
                                    class="profile-image img-circle"></a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php?id=<?php echo $_SESSION['id']; ?>"><span
                                            class="glyphicon glyphicon-user" aria-hidden="true"></span> Mon mur</a></li>
                                <li><a href="#edit-info<?php echo $_SESSION['id']; ?>"><span
                                            class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        Informations</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"
                                                               aria-hidden="true"></span> Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /top nav -->
        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    </body>
</html>