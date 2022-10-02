<?php
include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
include 'C:\Users\luidj\Documents\perso\Motify/Manager/Usermanager.php';
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$pass2 = password_hash($password, PASSWORD_BCRYPT);
print($username." ".$pass2);

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$newuser = new UserManager($db);
$newuser->addUser($username, $pass2, $role);
header("index.html");


