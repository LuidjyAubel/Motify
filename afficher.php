<?php
include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
include 'C:\Users\luidj\Documents\perso\Motify/Manager/Legomanager.php';
$id = $_GET['id'];
$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$Legomanager = new LegoManager($db);
$requete = $Legomanager->getOne();
$url = "https://rebrickable.com/api/v3/lego/sets/".$requete[0]->getLego_id()."/?key=".API_KEY;

  $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //bidouille cause localhost
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //bidouille cause localhost

       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
         $obj = json_decode($output);
        // var_dump($obj);
        print("<h1> Set n°".$obj->{'set_num'}."</h1>");
       print("<p> Référence du set : ".$obj->{'set_num'}."</p>");
       print("<p> Nom du Set : ".$obj->{'name'}."</p>");
       print("<p> Nombre de pièce : ".$obj->{'num_parts'}."</p>");
       print('<p> Date de parution : '.$obj->{'year'}."</p>");
       print('<img src="'.$obj->{'set_img_url'}.'" alt="image du set">');
   
        if (curl_errno($ch)) {
            echo curl_error($ch);
        }
        curl_close($ch);  