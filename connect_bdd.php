<?php
include('conf.php');

$DataBase = mysqli_connect(DBHOST, DBUSER, DBPASSWORD);

if(mysqli_connect_error()){
    print('Connexion à la base de donnée: fail'.mysqli_connect_error());
    exit();
}