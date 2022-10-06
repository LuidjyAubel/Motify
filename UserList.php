<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/home.css">
    <title>Lego Liste | Liste des utilisateurs
    </title>
    </head>
    <body>
        <header>
            <h1>Lego Liste | Liste des utilisateurs</h1>
            <nav class="topnav" id="myTopnav">
              <a class="topnav__link" href="#">Home</a>
              <a class="topnav__link" href="news.html">News user</a>
              <a class="topnav__link" href="liste des utilisateurs">Liste des utilisateurs</a>
              <a class="topnav__link" href="news.html">News Lego</a>
              <a class="topnav__link" href="LegoList.php">Liste des lego</a>
              <a class="topnav__link" id="right" href="connect.html">| Login</a>
            </nav>
          </header>
          <main>
            <div class="main__title">
                <h3>Liste Lego | Liste des utilisateurs</h3>
            </div>
            <table border="1px">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th colspan="2">Option</th>
                </tr>
            <?php
            include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
            include 'C:\Users\luidj\Documents\perso\Motify/Manager/Usermanager.php';
            $db = new PDO(DBHOST, DBUSER, DBPASSWORD);
            $Usermanager = new UserManager($db);
            $tabuser = $Usermanager->getList();

                foreach($tabuser as $article)
            {
            echo "<tr>";
            echo "<td>".$article->getId()."</td>";
            echo "<td>".$article->getUsername()."</td>";
            echo "<td>".$article->getPassword()."</td>";
            echo "<td>".$article->getRole()."</td>";
            echo "<td><a href='updateUser.php?id=".$article->getId()."'>modifier</a></td>";
            echo "<td><a href='deleteUser.php?id=".$article->getId()."'>Suprimer</a></td>";
            echo "</tr>";
            }
            ?>
            </table>
        </main>
    </body>
</html>