<?php
include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
include 'C:\Users\luidj\Documents\perso\Motify/Manager/Usermanager.php';
$id = $_GET['id'];

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$deluser = new UserManager($db);
$deluser->delete($id);
header('Location: UserList.php');