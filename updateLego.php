<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/style/style.css">
    <title>Lego Liste | Modifier un lego
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
            <div class="formulaire">
                <h3>Liste Lego | Modifier un lego</h3><?php
include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
include 'C:\Users\luidj\Documents\perso\Motify/Manager/Legomanager.php';
$id = $_GET['id'];
$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$Legomanager = new LegoManager($db);
$requete = $Legomanager->getOne();
foreach($requete as $items){
        print("<form method='POST' action='http://localhost:8000/updateLego2.php'>");
        print("<label for='ref'>Lego Reférence : </label>");
        print("<input type='text' name='ref' value=".$items->getLego_id()."><br><br>");

        if ($items->getComplet() == "non"){
            print("<label for='comp'>Lego Imcomplet : </label>");
        }else{
            print("<label for='comp'>Lego complet : </label>");
        }
        print("<input type='radio' name='complet' id='comp' value=".$items->getComplet()." checked/><br><br>");
        if ($items->getComplet() == "oui"){
            print("<label for='imcomplet'>Lego Imcomplet : </label>");
            print("<input type='radio' name='complet' id='imcomplet' value='non'><br><br>");
        }else{
            print("<label for='complet'>Lego Complet : </label>");
            print("<input type='radio' name='complet' id='complet' value='oui'><br><br>");
        }

        if ($items->getFigurine() == "non"){
            print("<label for='comp'>Lego sans figurine : </label>");
        }else{
            print("<label for='comp'>Lego avec figurine : </label>");
        }
        print("<input type='radio' id='comp' name='figurine' value=".$items->getFigurine()." checked/><br><br>");
        if ($items->getFigurine() == "oui"){
            print("<label for='Sfigure'>Lego Sans figurine : </label>");
            print("<input type='radio' name='figurine' id='Sfigure' value='non'><br><br>");
        }else{
            print("<label for='Afigurine'>Lego Avec Figurine : </label>");
            print("<input type='radio' name='figurine' id='Afigurine' value='oui'><br><br>");
        }

        if ($items->getBoite() == "non"){
            print("<label for='comp'>Lego sans Boite : </label>");
        }else{
            print("<label for='comp'>Lego avec Boite : </label>");
        }
        print("<input type='radio' id='comp' name='boite' value=".$items->getBoite()." checked/><br><br>");
        if ($items->getBoite() == "oui"){
            print("<label for='Sboite'>Lego sans boite : </label>");
            print("<input type='radio' name='boite' id='Sboite' value='non'><br><br>");
        }else{
            print("<label for='Aboite'>Lego avec boite : </label>");
            print("<input type='radio' name='boite' id='Aboite' value='oui'><br><br>");
        }

        if ($items->getNotice() == "non"){
            print("<label for='comp'>Lego sans Notice : </label>");
        }else{
            print("<label for='comp'>Lego avec Notice : </label>");
        }
        print("<input type='radio' id='comp' name='notice' value=".$items->getNotice()." checked/><br><br>");
        if ($items->getNotice() == "oui"){
            print("<label for='SNotice'>Lego Sans Notice : </label>");
            print("<input type='radio' name='notice' id='SNotice' value='non'>");
        }else{
            print("<label for='ANotice'>Lego Avec Notice : </label>");
            print("<input type='radio' name='notice' id='ANotice' value='oui'>");
        }
        print("<input type='submit' value='Valider'>");
        print("</form>");
    }?>
    </div>
        </main>
        <footer>
        <p>Author: Luidjy Aubel</p>
        <p><a href="aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
      </footer>
    </body>
</html>
