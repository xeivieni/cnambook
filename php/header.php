<?php
/**
 * Created by PhpStorm.
 * User: clem
 * Header of the website.
 * This file must be included at the very beginning of every pages.
 * This header also include the bootstrap stylesheets and scripts.
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom -->
    <link href="../css/styles.css" rel="stylesheet">

    <!-- Logo -->
    <link rel="apple-touch-icon" sizes="57x57" href="../img/logo.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../img/logo.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../img/logo.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../img/logo.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/logo.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../img/logo.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../img/logo.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../img/logo.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/logo.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../img/logo.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/logo.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../img/logo.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/logo.ico/favicon-16x16.png">
    <link rel="manifest" href="../img/logo.ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body>
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
                    <!-- logo : redirects to index.php -->
                    <a href="index.php" class="navbar-brand logo">c</a>
                </div>
                <nav class="collapse navbar-collapse" role="navigation">
                    <!-- search bar : redirects to search.php.php-->
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
                            <!-- Acceuil button : redirects to index.php-->
                            <a href="index.php"><i class="glyphicon glyphicon-home"></i> Accueil</a>
                        </li>
                        <li>
                            <!-- Groups button : redirects to groups.php-->
                            <a href="user_list.php" role="button"><i class="glyphicon glyphicon-education"></i>
                                Groupes</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Main user actions -->
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"><img
                                    src="<?php echo $user[0]["lien_photo"]; ?>"
                                    class="profile-image img-circle"></a>
                            <ul class="dropdown-menu">
                                <!-- Profile : redirects to profile.php with the correct if (from the session) -->
                                <li><a href="profile.php?id=<?php echo $_SESSION['id']; ?>"><span
                                            class="glyphicon glyphicon-user" aria-hidden="true"></span> Mon mur</a></li>
                                <!-- Edit information : redirects to a modal form -->
                                <li><a href="#" data-toggle="modal"
                                       data-target="#edit-info<?php echo $_SESSION['id']; ?>"><span
                                            class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        Informations</a></li>
                                <li role="separator" class="divider"></li>
                                <!-- Log out -->
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

    <!-- Modal form for editing personal information -->
    <div class="modal fade" id="edit-info<?php echo $_SESSION['id']; ?>" tabindex="-1" role="dialog"
         aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Editer les informations du profil</h4>
                </div>
                <div class="modal-body">
                    <form class="form-signin" action="edit.php" method="get">

                        <label for="lastName">Nom de famille</label>
                        <input type="text" id="lastName" name="lastName" class="form-control"
                               placeholder="<?php echo $user[0]["nom"]; ?>">

                        <label for="firstName">Prénom</label>
                        <input type="text" id="firstName" name="firstName" class="form-control" placeholder="<?php echo $user[0]["prenom"]; ?>">

                        <label for="birthdayDate">Date de naissance</label>
                        <input type="date" id="birthdayDate" name="birthdayDate" class="form-control"
                               placeholder="<?php echo $user[0]["date_naissance"]; ?>">

                        <label for="inputEmail">Adresse email</label>
                        <input type="email" id="inputEmail" name="inputEmail" class="form-control"
                               placeholder="<?php echo $user[0]["mail"]; ?>">

                        <label for="hometown">Ville d'origine</label>
                        <input type="text" id="hometown" name="hometown" class="form-control"
                               placeholder="<?php echo $user[0]["ville_origine"]; ?>">

                        <label for="cityResidency">Ville de résidence</label>
                        <input type="text" id="cityResidency" name="cityResidency" class="form-control"
                               placeholder="<?php echo $user[0]["ville_residence"]; ?>">

                        <label for="section">Section</label>
                        <input type="text" id="section" name="section" class="form-control" placeholder="<?php echo $user[0]["idsection"]; ?>">

                        <label for="sectionYear">Promotion</label>
                        <input type="text" id="sectionYear" name="sectionYear" class="form-control"
                               placeholder="Promotion">

                        <button type="submit" class="btn btn-primary"><span
                                class="glyphicon glyphicon-floppy-disk"></span> Save
                        </button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>