<?php
include 'conf.php';
include 'Manager/Legomanager.php';
$id = $_POST['ref'];
$complet = $_POST['complet'];
$figurine = $_POST['figurine'];
$boite = $_POST['boite'];
$notice = $_POST['notice'];

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$deluser = new Legomanager($db);
$deluser->updateLego($id, $complet, $figurine, $boite, $notice);
header('Location: LegoList.php');