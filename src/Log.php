<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/style/style.css">
    <link rel="icon" type="image/x-png" href="../Assets/picture/motify.png">
    <title>Lego Liste | Log
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
                </ul>
              </nav>
          </header>
          <main>
            <pre id="log"></pre>
<script>
    function fetchLog() {
        fetch("../log/MotifyLog.log")
            .then((res) => res.text())
            .then((text) => {
                var logElement = document.getElementById("log");
                logElement.textContent = text;
            })
            .catch((e) => console.error(e));
    }

    // Rafraîchir le contenu du fichier de log toutes les 5 secondes
    setInterval(fetchLog, 5000);

    // Appeler fetchLog une première fois pour afficher le contenu initial
    fetchLog();
</script>
        </main>
    </body>
</html>