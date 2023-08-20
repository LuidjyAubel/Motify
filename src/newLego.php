<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/style/style.css">
    <link rel="icon" type="image/x-png" href="../Assets/picture/motify.png">
    <title>Lego Liste</title>
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
            <h3>Lego Liste | Ajouter un Lego</h3>
            <form action="addLego.php" method="post">
                <label for="id">Numéro du set : </label>
                <input type="text" name="id" placeholder="Numéro du set..." required /><br/>
                <label for="Complet">Complet : </label>
                <input type="radio" name="complet" id="Complet" value="oui"/>
                <label for="Incomplet">Incomplet : </label>
                <input type="radio" name="complet" id="Incomplet" value="non" checked/><br/>
                <label for="Afigurine">Avec Figurine :</label>
                <input type="radio" name="figurine" id="Afigurine" value="oui">
                <label for="Pfigurine">Sans Figurine :</label>
                <input type="radio" name="figurine" id="Pfigurine" checked value="non"><br/>
                <label for="Aboite">Avec boite :</label>
                <input type="radio" name="boite" id="Aboite" value="oui">
                <label for="Pboite">Sans boite :</label>
                <input type="radio" name="boite" id="Pboite" checked value="non"><br/>
                <label for="Anotice">Avec notice :</label>
                <input type="radio" name="notice" id="Anotice" value="oui">
                <label for="Pnotice">Sans notice :</label>
                <input type="radio" name="notice" id="Pnotice" checked value="non"><br/>
                <input type="submit" value="Enregistrer" />
            </form>
        </div>
    </main>
    <footer>
        <p>Author: Luidjy Aubel</p>
        <p><a target="_blank" href="https://aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
      </footer>
</body>

</html>