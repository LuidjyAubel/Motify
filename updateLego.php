<?php
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
            print("<input type='radio' name='notice' id='SNotice' value='non'><br><br>");
        }else{
            print("<label for='ANotice'>Lego Avec Notice : </label>");
            print("<input type='radio' name='notice' id='ANotice' value='oui'><br><br>");
        }
        print("<input type='submit' value='Valider'>");
        print("</form>");
    }
