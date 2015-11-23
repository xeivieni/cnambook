<?php
/**
 * Created by PhpStorm.
 * User: clem
 * Date: 23/11/2015
 * Time: 21:26
 */

include("functions.php");
include("groups.php");
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

<body>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php if ($isfriend == 1) : ?>
            <!--<a href="unfriend.php?id=<?php //echo $student["iduser"];?>"><span class="glyphicon glyphicon-remove pull-right"></span></a>-->
            <a href=""><span class="glyphicon glyphicon-remove pull-right"></span></a>
        <?php if ($isfriend == 0) : ?>
            <a href="friend.php?id=<?php echo $student["iduser"];?>"><span class="glyphicon glyphicon-plus pull-right"></span></a>
        <?php endif ?>

        <a href="profile.php?id=<?php echo $student["iduser"]; ?>"><img
                src="<?php echo $student[0]["lien_photo"]; ?>" class="img-circle pull-left" width="40" height="40">
            <h4>&nbsp;<?php echo " " . $student[0]["prenom"] . " " . $student[0]["nom"]; ?></h4></a>
    </div>
    <div class="panel-body">
        <?php echo calculateAge($student["date_naissance"])." ans"; ?>
        <br>
        <?php echo $student["ville_residence"]; ?>
    </div>
</div>


</body>
</html>