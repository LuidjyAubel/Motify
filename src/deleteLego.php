<?php
include '../config/conf.php';
include '../Classes/Manager/Legomanager.php';
$id = $_GET['id'];

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$delLego = new LegoManager($db);
$delLego->delete($id);
header('Location: LegoList.php');