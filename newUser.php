<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/style/style.css">
    <title>Lego Liste</title>
    </head>
    <body>
        <header>
            <nav class="topnav" id="myTopnav">
                <ul>
                  <li class="title">Motify</li>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="newUser.php">New user</a></li>
                  <li><a href="UserList.php">Liste des Utilisateurs</a></li>
                  <li><a href="new.html">New lego</a></li>
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
                <h3>Motify | Ajouter un utilisateur</h3>
                <form action="http://localhost:8000/addUser.php" method="post">
                    <label for="username">Username</label>  
                        <input type="text" name="username" placeholder="Username">
                    <label for="password">Password</label>
                        <input type="password" name="password" placeholder="mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir nombre, maj, min et 8 caractère minimum">
                    <label for="role">Role</label>
                        <select name="role">
                            <option value="USER">USER</option>
                            <option value="ADMIN">ADMIN</option>
                        </select>
                    <input type="submit"value="Enregistrer"/>
                </form>
            </div>
        </main>
        <footer>
            <p>Author: Luidjy Aubel</p>
            <p><a target="_blank" href="https://aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
          </footer>
    </body>
</html>