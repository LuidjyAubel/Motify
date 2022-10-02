<?php
include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
include 'C:\Users\luidj\Documents\perso\Motify/Manager/Legomanager.php';
$id = $_POST['id'];
$complet = $_POST['complet'];
$figurine = $_POST['figurine'];
$boite = $_POST['boite'];
$notice = $_POST['notice'];

print($id." ".$complet." ".$figurine." ".$boite." ".$notice);

$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$newLego = new LegoManager($db);
$newLego->addLego($id, $complet, $figurine,$boite,$notice);
header("LegoList.php");


