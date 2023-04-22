<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/style/style.css">
    <link rel="icon" type="image/x-png" href="../Assets/picture/motify.png">
    <title>Motify</title>
    </head>
    <body>
        <header>
            <?php session_start();?>
            <nav class="topnav" id="myTopnav">
                <ul>
                  <li class="title">Motify</li>
                  <li><a href="../index.php">Home</a></li>
                  <li><a href="newUser.php">New user</a></li>
                  <?php if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){echo'<li><a href="UserList.php">Liste des Utilisateurs</a></li>';}?>
                  <li><a href="newLego.php">New lego</a></li>
                  <?php if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){echo'<li><a href="LegoList.php">Liste des lego</a></li>';}?>
                  <?php
                    if ((isset($_SESSION['connecter']))&&($_SESSION['connecter'] == TRUE)){
                      echo '<li style="float:right"><a href="deconnect.php">Logout</a></li>';
                    }else{
                      echo '<li style="float:right"><a href="connection.php">Login</a></li>';
                    }?>
                </ul>
              </nav>
          </header>
          <main>
            <?php
            if(isset($_SESSION['ERROR'])){
                print("<div class='error'><h3>/!\\ ".$_SESSION['ERROR']."</h3></div>");
                unset($_SESSION['ERROR']);
            }
            ?>
            <div class="main__title">
                <h3>Motify | Connexion</h3>
                <form name="connection" action="connect.php" method="post">
                    <label for="username">Username</label>    
                        <input type="text" name="username" placeholder="Username" required>
                    
                    <label for="password">Password</label>
                        <input type="password" name="password" placeholder="mot de passe" required>
                    
                    <input type="submit" id="btn"/>
                </form>
            </div>
        </main>
        <footer>
            <p>Author: Luidjy Aubel</p>
          </footer>
    </body>
</html>