<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/home.css">
    <title>Lego Liste | Liste des Lego
    </title>
    </head>
    <body>
        <header>
            <h1>Lego Liste | Liste des Lego</h1>
            <nav class="topnav" id="myTopnav">
              <a class="topnav__link" href="#">Home</a>
              <a class="topnav__link" href="news.html">News user</a>
              <a class="topnav__link" href="UserList.php">Liste des utilisateurs</a>
              <a class="topnav__link" href="news.html">News Lego</a>
              <a class="topnav__link" href="LegoList.php">Liste des lego</a>
              <a class="topnav__link" id="right" href="connect.html">| Login</a>
            </nav>
          </header>
          <main>
            <div class="main__title">
                <h3>Liste Lego | Liste des Lego</h3>
            </div>
            <table border="1px">
                <tr>
                    <th>Numéro du set</th>
                    <th>Complet</th>
                    <th>Figurine</th>
                    <th>Boite</th>
                    <th>Notice</th>
                    <th colspan="2">Option</th>
                </tr>
            <?php
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
            echo "<td><a href='#'>Modifier</a></td>";
            echo "<td><a href='deleteLego.php?id=".$article->getLego_id()."'>Suprimer</a></td>";
            echo "</tr>";
            }
            ?>
            </table>
        </main>
    </body>
</html>