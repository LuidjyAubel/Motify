<?php
include 'C:\Users\luidj\Documents\perso\Motify/conf.php';
include 'C:\Users\luidj\Documents\perso\Motify/Manager/Usermanager.php';
$id = $_GET['id'];
$db = new PDO(DBHOST, DBUSER, DBPASSWORD);
$Usermanager = new Usermanager($db);
$requete = $Usermanager->getOne();
foreach($requete as $items){
        print("<form method='POST' action='http://localhost:8000/updateUser2.php'>");
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
    }
