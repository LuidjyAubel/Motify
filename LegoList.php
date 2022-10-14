<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/style/style.css">
    <title>Lego Liste | Liste des Lego
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
                <h3>Liste Lego | Liste des Lego</h3>
            
            <table border="1px">
                <tr>
                    <th>Numéro du set</th>
                    <th>Complet</th>
                    <th>Figurine</th>
                    <th>Boite</th>
                    <th>Notice</th>
                    <th colspan="3">Option</th>
                </tr>
            <?php
            session_start();
            if ($_SESSION['connecter'] == TRUE) {
            include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
            include 'C:\Users\luidj\Documents\perso\Motify/Manager/Legomanager.php';
            $db = new PDO(DBHOST, DBUSER, DBPASSWORD);
            $Legomanager = new LegoManager($db);
            $tablego = $Legomanager->getList();

                foreach($tablego as $article)
            {
            echo "<tr>";
            echo "<td>".$article->getLego_id()."</td>";
            echo "<td>".$article->getComplet()."</td>";
            echo "<td>".$article->getFigurine()."</td>";
            echo "<td>".$article->getBoite()."</td>";
            echo "<td>".$article->getNotice()."</td>";
            echo "<td><a href='afficher.php?id=".$article->getLego_id()."'>afficher</a></td>";
            echo "<td><a href='updateLego.php?id=".$article->getLego_id()."'>Modifier</a></td>";
            echo "<td><a href='deleteLego.php?id=".$article->getLego_id()."'>Suprimer</a></td>";
            echo "</tr>";
            }
        }else{
            header("Location: connect.html");
        }
            ?>
            </table></div>
        </main>
        <footer>
        <p>Author: Luidjy Aubel</p>
        <p><a href="aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
      </footer>
    </body>
</html>