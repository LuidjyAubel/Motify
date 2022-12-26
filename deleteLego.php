<?php
use Conf;
use Manager\Legomanager\LegoManager;
$id = $_GET['id'];

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$delLego = new LegoManager($db);
$delLego->delete($id);
header('Location: LegoList.php');