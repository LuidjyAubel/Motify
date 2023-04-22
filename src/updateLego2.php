<?php
include '../config/conf.php';
include '../Classes/Manager/Legomanager.php';
$id = $_POST['ref'];
$complet = $_POST['complet'];
$figurine = $_POST['figurine'];
$boite = $_POST['boite'];
$notice = $_POST['notice'];
$originId = $_POST['test'];

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$deluser = new Legomanager($db);
$deluser->updateLego($id, $complet, $figurine, $boite, $notice, $originId);
header('Location: LegoList.php');