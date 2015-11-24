<?php
//Destroying the current session to log out and remove cookie
session_start();
session_destroy();
header("Location: ../html/login.html");
