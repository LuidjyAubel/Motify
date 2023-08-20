<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/style/style.css">
    <link rel="icon" type="image/x-png" href="../Assets/picture/motify.png">
    <title>Lego Liste | modifier un utilisateur
    </title>
    </head>
    <body>
        <header>
            <nav class="topnav" id="myTopnav">
                <ul>
                  <li class="title">Motify</li>
                  <li><a href="../index.php">Home</a></li>
                  <li><a href="newUser.php">New user</a></li>
                  <li><a href="UserList.php">Liste des Utilisateurs</a></li>
                  <li><a href="newLego.php">New lego</a></li>
                  <li><a href="LegoList.php">Liste des lego</a></li>
                  <?php
                    session_start();
                    if (!$_SESSION['connecter'] == TRUE) {
                        header('Location: connection.php');
                        }else{
                        echo  '<li style="float:right"><a href="deconnect.php">Logout</a></li>';
                        }
                        if ((isset($_SESSION['Role']))&&($_SESSION['Role'] != 'ADMIN')){
                          header('Location: ../index.php');
                      }
                  ?>
                  <li><a href="Search.php">Recherche</a></li>
                </ul>
              </nav>
          </header>
          <main>
            <div class="formulaire">
                <h3>Liste Lego | Modifier un utilisateur</h3><?php
include '../config/conf.php';
include '../Classes/Manager/Usermanager.php';
$id = $_GET['id'];
$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$Usermanager = new Usermanager($db);
$requete = $Usermanager->getOne();
foreach($requete as $items){
        print("<form method='POST' action='updateUser2.php'>");
        print("<label for='ref'>User id : </label>");
        print("<input type='text' name='ref' value=".$items->getId()."><br><br>");
        print("<label for='username'>Username : </label>");
        print("<input type='text' name='username' value='".$items->getUsername()."'/><br><br>");
        print('<input type="password" name="password" placeholder="mot de passe">');
        print('<select name="role">');
        print('<option value="USER">USER</option>
        <option value="ADMIN">ADMIN</option>
    </select>');
        print("<input type='submit' value='Valider'>");
        print("</form>");
    }?>
    </div>
        </main>
        <footer>
        <p>Author: Luidjy Aubel</p>
        <p><a target="_blank" href="https://aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
      </footer>
    </body>
</html>
