<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/style/style.css">
    <title>Lego Liste | Liste des afficher lego
    </title>
    </head>
    <body>
        <header>
            <nav class="topnav" id="myTopnav">
                <ul>
                  <li class="title">Motify</li>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="newUser.php">New user</a></li>
                  <li><a href="UserList.php">Liste des Utilisateurs</a></li>
                  <li><a href="newLego.php">New lego</a></li>
                  <li><a href="LegoList.php">Liste des lego</a></li>
                  <li style="float:right"><a href="connect.html">Login</a></li>
                </ul>
              </nav>
          </header>
          <main>
            <div class="aff">
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

       $url2 ="https://rebrickable.com/api/v3/lego/themes/".$obj->theme_id."/?key=".API_KEY;
       $ch2 = curl_init();

       curl_setopt($ch2, CURLOPT_URL, $url2);
       curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0); //bidouille cause localhost
       curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0); //bidouille cause localhost

      curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);

       $output2 = curl_exec($ch2);
        $obj2 = json_decode($output2);
        print('<p> Thème du set : '.$obj2->{'name'}."</p>");
        if (curl_errno($ch2)) {
            echo curl_error($ch2);
        }
        curl_close($ch2);

       print('<img src="'.$obj->{'set_img_url'}.'" alt="image du set" width="500" height="300">');
   
        if (curl_errno($ch)) {
            echo curl_error($ch);
        }
        curl_close($ch);  
        ?></div>
        </main>
        <footer>
        <p>Author: Luidjy Aubel</p>
        <p><a href="aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
      </footer>
    </body>
</html>