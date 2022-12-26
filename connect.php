<?php
use Conf;
use Manager\Usermanager\Usermanager;
$username = $_POST['username'];
$password = $_POST['password'];

//print($username." ".$password);

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$newuser = new UserManager($db);
$username = stripslashes($username);
$username = htmlspecialchars($username);
//$newuser->connect($username, $password);
$newuser->co($username, $password);