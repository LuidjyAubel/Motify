<?php
include 'conf.php';
include 'Manager/Usermanager.php';
$username = $_POST['username'];
$password = $_POST['password'];

//print($username." ".$password);
try{
$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$newuser = new UserManager($db);
$username = stripslashes($username);
$username = htmlspecialchars($username);
$newuser->co($username, $password);
}catch(PDOException $e){
    print("Problème de base de donnée : ".$e->getMessage());
}