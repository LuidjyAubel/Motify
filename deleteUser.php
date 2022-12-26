<?php
include 'conf.php';
include 'Manager/Usermanager.php';
$id = $_GET['id'];

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$deluser = new UserManager($db);
$deluser->delete($id);
header('Location: UserList.php');