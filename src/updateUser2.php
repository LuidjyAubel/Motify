<?php
include '../config/conf.php';
include '../Classes/Manager/Usermanager.php';
$id = $_POST['ref'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$pass =  password_hash($password, PASSWORD_BCRYPT);

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$deluser = new Usermanager($db);
$deluser->updateUser($id, $username, $pass, $role);
header('Location: UserList.php');