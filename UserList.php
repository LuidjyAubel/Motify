<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/style/style.css">
    <title>Lego Liste | Liste des utilisateurs
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
                  <?php
                    session_start();
                    if (!$_SESSION['connecter'] == TRUE) {
                        header('Location: connect.html');
                        }else{
                        echo  '<li style="float:right"><a href="deconnect.php">Logout</a></li>';
                        }
                  ?>
                </ul>
              </nav>
          </header>
          <main>
            <div class="formulaire">
                <h3>Liste Lego | Liste des utilisateurs</h3>
            
            <table>
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
            </table></div>
        </main>
        <footer>
        <p>Author: Luidjy Aubel</p>
        <p><a target="_blank" href="https://aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
      </footer>
    </body>
</html>