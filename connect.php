<?php
include 'conf.php';
include 'Manager/Usermanager.php';
$username = $_POST['username'];
$password = $_POST['password'];

print($username." ".$password);

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$newuser = new UserManager($db);
$newuser->connect($username, $password);