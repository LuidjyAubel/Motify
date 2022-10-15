<?php
include 'conf.php';
include 'Manager/Usermanager.php';
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$pass2 = password_hash($password, PASSWORD_BCRYPT);
print($username." ".$pass2);

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$newuser = new UserManager($db);
$newuser->addUser($username, $pass2, $role);
header('Location: UserList.php');


