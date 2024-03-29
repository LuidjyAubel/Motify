<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Motify" property="og:title" />
  <meta content="Web application for manage your lego collection" property="og:description" />
    <meta content="http://aubel-luidjy.alwaysdata.net/motify/" property="og:url" />
    <meta content="/Assets/picture/motify.png" property="og:image" />
    <meta content="#43B581" data-react-helmet="true" name="theme-color" />
    <link rel="stylesheet" href="Assets/style/style.css">
    <link rel="icon" type="image/x-png" href="Assets/picture/motify.png">
    <title>Motify</title>
    </head>
    <body>
        <header>
          <?php session_start();?>
            <nav class="topnav" id="myTopnav">
              <ul>
                <li class="title">Motify</li>
                <li><a href="index.php">Home</a></li>
                <?php if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){echo'<li><a href="./src/newUser.php">New user</a></li>';}?>
                <li><a href="./src/UserList.php">Liste des Utilisateurs</a></li>
                <?php if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){echo'<li><a href="./src/newLego.php">New lego</a></li>';}?>
                <li><a href="./src/LegoList.php">Liste des lego</a></li>
                <?php
                    if ((isset($_SESSION['connecter']))&&($_SESSION['connecter'] == TRUE)){
                      echo '<li style="float:right"><a href="./src/deconnect.php">Logout</a></li>';
                    }else{
                      echo '<li style="float:right"><a href="./src/connection.php">Login</a></li>';
                    }?>
                  <li><a href="./src/Search.php">Recherche</a></li>
              </ul>
            </nav>
          </header>
          <main>
            <div class="main">
                    <a class="button1" href="./src/connection.php"><span class="TxtBtn">Acceder à la liste des lego</span></a>
            <div class="text">
              <p>Motify est une application web qui permet d'organiser ses set de lego</p>
              <p>/!\ Mise à jour : la fonction de recherche ce fait sur le nom des sets</p>
              <p>/!\ Prochaine update : Graphique</p>
              <p>L'application utilise l'API Rebrickable</p>
              <p>Dêpot github du projet <a href="https://github.com/LuidjyAubel/Motify">Motify</a></p>
              <p><a href="https://rebrickable.com">Rebrickable</a></p>
              <img src="Assets/picture/LEGO_logo.svg.png" alt="Logo de lego" width="200" height="200">
            </div>
            </div>
        </main>
        <footer>
 <!--         <p>Author: Luidjy Aubel</p>
          <p><a target="_blank" href="https://aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
        </footer>-->
    </body>
</html>