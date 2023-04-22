<?php
include '../config/conf.php';
include '../Classes/Manager/Legomanager.php';
$id = $_POST['id'];
$complet = $_POST['complet'];
$figurine = $_POST['figurine'];
$boite = $_POST['boite'];
$notice = $_POST['notice'];

//print($id." ".$complet." ".$figurine." ".$boite." ".$notice);
try{
$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$newLego = new LegoManager($db);
$newLego->addLego($id, $complet, $figurine,$boite,$notice);
header('Location: LegoList.php');
}catch(PDOException $e){
    print("Problème de base de donnée : ".$e->getMessage());
}


