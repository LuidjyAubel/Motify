<?php
include '../config/conf.php';
include '../Classes/Manager/Usermanager.php';;
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$pass2 = password_hash($password, PASSWORD_BCRYPT);
print($username." ".$pass2);

try{
$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$newuser = new UserManager($db);

$username = trim($username);
$username = stripslashes($username);
$username = htmlspecialchars($username);

$newuser->addUser($username, $pass2, $role);
header('Location: UserList.php');
}catch(PDOException $e){
    print("Problème de base de donnée : ".$e->getMessage());
}


