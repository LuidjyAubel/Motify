<?php
include '../config/conf.php';
include '../Classes/Manager/Legomanager.php';

try{
$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$manager = new Legomanager($db);
$requete = $manager->getList();
$manager->exportCSV($requete);
header( 'Content-Type: application/csv' );
header( 'Content-Disposition: attachment; filename="Lego.csv";' );
}catch(PDOException $e){
    print("Problème de base de donnée : ".$e->getMessage());
}