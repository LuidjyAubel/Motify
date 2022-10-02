<?php
include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
include 'C:\Users\luidj\Documents\perso\Motify/Manager/Usermanager.php';
$username = $_POST['username'];
$password = $_POST['password'];

print($username." ".$password);

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$newuser = new UserManager($db);
$newuser->connect($username, $password);