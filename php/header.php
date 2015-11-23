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
                            <a href="index.php"><i class="glyphicon glyphicon-home"></i> Accueil</a>
                        </li>
                        <li>
                            <a href="user_list.php" role="button"><i class="glyphicon glyphicon-education"></i>
                                Groupes</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge">0</span></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"><img
                                    src="<?php echo $user[0]["lien_photo"]; ?>"
                                    class="profile-image img-circle"></a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php?id=<?php echo $_SESSION['id']; ?>"><span
                                            class="glyphicon glyphicon-user" aria-hidden="true"></span> Mon mur</a></li>
                                <li><a href="#" data-toggle="modal"
                                       data-target="#edit-info<?php echo $_SESSION['id']; ?>"><span
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

    <div class="modal fade" id="edit-info<?php echo $_SESSION['id']; ?>" tabindex="-1" role="dialog"
         aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Editer les informations du profil</h4>
                </div>
                <div class="modal-body">
                    <form action="">

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

                        <button type="button" class="btn btn-primary" data-dismiss="modal"><span
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