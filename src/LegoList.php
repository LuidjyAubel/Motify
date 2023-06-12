<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/style/style.css">
    <link rel="icon" type="image/x-png" href="../Assets/picture/motify.png">
    <title>Lego Liste | Liste des Lego
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
            <div class="formulaire">
                <h3>Liste Lego | Liste des Lego</h3>
            
            <table border="1px">
                <tr>
                    <th>Numéro du set</th>
                    <th>Complet</th>
                    <th>Figurine</th>
                    <th>Boite</th>
                    <th>Notice</th>
                    <th><img id="sortImg" src="../Assets/picture/icons8-down-button-64.png" width="15" height="15"/> Date</th>
                    <th colspan="3">Option</th>
                </tr>
            <?php
            include('../config/conf.php');
            include('../Classes/Manager/Legomanager.php');
            $db = new PDO(DBHOST, DBUSER, DBPASSWORD);
            $Legomanager = new LegoManager($db);
            $tablego = $Legomanager->getList();
            $attr = array();
                foreach($tablego as $article)
            {
              $url = "https://rebrickable.com/api/v3/lego/sets/".$article->getLego_id()."/?key=".API_KEY;

              $ch = curl_init();
  
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //bidouille cause localhost
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //bidouille cause localhost
  
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
          $output = curl_exec($ch);
           $obj = json_decode($output);
            echo "<tr>";
            echo "<td>".$article->getLego_id()."</td>";
            echo "<td>".$article->getComplet()."</td>";
            echo "<td>".$article->getFigurine()."</td>";
            echo "<td>".$article->getBoite()."</td>";
            echo "<td>".$article->getNotice()."</td>";
            echo "<td>".$obj->{'year'}."</td>";
            echo "<td><a href='afficher.php?id=".$article->getLego_id()."'>afficher</a></td>";
            if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){
            echo "<td><a href='updateLego.php?id=".$article->getLego_id()."'>Modifier</a></td>";
            echo "<td><a href='deleteLego.php?id=".$article->getLego_id()."'>Suprimer</a></td>";
            }
            echo "</tr>";
            }
            print("<form method='POST' action='csv.php'>");
            print("<input type='submit' value='Exporter en CSV'>");
            print("</form>");
            ?>
            </table></div>
            <script src="../Assets/js/tri.js"></script>
        </main>
      <!--  <footer>
        <p>Author: Luidjy Aubel</p>
        <p><a target="_blank" href="https://aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
      </footer>-->
    </body>
</html>