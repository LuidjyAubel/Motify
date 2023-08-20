<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/style/style.css">
    <link rel="icon" type="image/x-png" href="../Assets/picture/motify.png">
    <title>Lego Liste | Liste des utilisateurs
    </title>
    </head>
    <body>
        <header>
            <?php session_start();?>
            <nav class="topnav" id="myTopnav">
                <ul>
                  <li class="title">Motify</li>
                  <li><a href="../index.php">Home</a></li>
                  <?php if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){echo'<li><a href="newUser.php">New user</a></li>';}?>
                  <li><a href="UserList.php">Liste des Utilisateurs</a></li>
                  <?php if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){echo'<li><a href="newLego.php">New lego</a></li>';}?>
                  <li><a href="LegoList.php">Liste des lego</a></li>
                  <?php
                    if (!$_SESSION['connecter'] == TRUE) {
                        header('Location: connection.php');
                        }else{
                        echo  '<li style="float:right"><a href="deconnect.php">Logout</a></li>';
                        }
                  ?>
                  <li><a href="search.php">Recherche</a></li>
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
                    <?php if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){echo'<th colspan="2">Option</th>';}?>
                </tr>
            <?php
            include('../config/conf.php');
            include('../Classes/Manager/Usermanager.php');
            $db = new PDO(DBHOST, DBUSER, DBPASSWORD);
            $Usermanager = new Usermanager($db);
            $tabuser = $Usermanager->getList();

                foreach($tabuser as $article)
            {
            echo "<tr>";
            echo "<td>".$article->getId()."</td>";
            echo "<td>".$article->getUsername()."</td>";
            echo "<td>".$article->getPassword()."</td>";
            echo "<td>".$article->getRole()."</td>";
            if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){
            echo "<td><a href='updateUser.php?id=".$article->getId()."'>modifier</a></td>";
            echo "<td><a href='deleteUser.php?id=".$article->getId()."'>Suprimer</a></td>";
            }
            echo "</tr>";
            }
            ?>
            </table></div>
        </main>
<!--        <footer>
        <p>Author: Luidjy Aubel</p>
        <p><a target="_blank" href="https://aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
      </footer>-->
    </body>
</html>