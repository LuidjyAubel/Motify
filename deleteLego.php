<?php
include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
include 'C:\Users\luidj\Documents\perso\Motify/Manager/Legomanager.php';
$id = $_GET['id'];

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$delLego = new LegoManager($db);
$delLego->delete($id);
header("index.html");