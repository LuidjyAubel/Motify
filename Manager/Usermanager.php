<?php
include(dirname(__DIR__) . '/Classes/User.php');
include(dirname(__DIR__).'/lib/MotifyLogging.php');
class Usermanager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }
    public function setDb($db)
    {
        $this->_db = $db;
    }
    public function addUser($user, $pass, $role)
    {
        $logger = new MotifyLogging();
        $logger->warning("adding new user : ".$user);
        $stmt = $this->_db->prepare('INSERT INTO users (Username, `Password`, `Role`) VALUES (?, ?, ?);');
        $stmt->bindParam(1, $user);
        $stmt->bindParam(2, $pass);
        $stmt->bindParam(3, $role);
        $stmt->execute();
    }
    public function updateUser($id, $username, $pass, $role)
    {
        $logger = new MotifyLogging();
        $logger->warning("Updating user : ".$id);
        $stmt = $this->_db->prepare("UPDATE users set Username=?, `Password`=?, `Role`=? WHERE Id=? ;");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $pass);
        $stmt->bindParam(3, $role);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    }
    public function delete($Id)
    {
        $logger = new MotifyLogging();
        $logger->warning("delecting the user with id : ".$Id);
        $stmt = $this->_db->prepare("DELETE FROM users WHERE Id= ?;");
        $stmt->bindParam(1, $Id);
        $stmt->execute();
    }
    public function co($MAiL, $pass2){
        session_start();
        $logger = new MotifyLogging();
        $_SESSION["connecter"] = FALSE;
        $request = $this->_db->prepare('SELECT `Id`, Username, `Password`, `Role` FROM users WHERE Username= ?;');
        $request->bindParam(1, $MAiL);
        $request->execute();

        $row = $request->rowCount();
			$fetch = $request->fetch();
			if($row > 0) {
                $hash = $fetch['Password'];
                if (password_verify($pass2, $hash)) {
                    echo 'Le mot de passe est valide !';
                    $_SESSION['connecter'] = TRUE;
                    $logger->Connecting($MAiL);
                    header("Location: LegoList.php");
                }else {
                    $_SESSION['ERROR'] = "Le Mot de passe est invalide !";
                    header("Location: connection.php");
                  //  session_destroy();
                    $logger->error($MAiL."Mot de passe invalide");
                }
			} else{
				$_SESSION['ERROR'] = "L'utilisateur n'existe pas !";
                header("Location: connection.php");
                $logger->error($MAiL." L'utilisateur n'existe pas !");
               //session_destroy();
			}
    }
    public function connect($MAiL, $pass2)
    {
        session_start();
        $logger = new MotifyLogging();
        $_SESSION["connecter"] = FALSE;
        $requete = $this->_db->query('SELECT `Id`, `Username`, `Password` FROM users');
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
            if ($MAiL == $ligne['Username']) {
                $hash = $ligne['Password'];
                if (password_verify($pass2, $hash)) {
                    echo 'Le mot de passe est valide !';
                    $_SESSION['connecter'] = TRUE;
                    $logger->Connecting($MAiL);
                    header("Location: LegoList.php");
                }else {
                    $error = 'Le mot de passe est invalide.';
                    header("Location: connection.php");
                    session_destroy();
                    $logger->error($MAiL." Connection fail");
                }
            }
        }
    }
    public function getList(): array
    {
        $logger = new MotifyLogging();
        $logger->message("display list of user");
        $userList = array();

        $request = $this->_db->query('SELECT `Id`, Username, `Password`, `Role` FROM users;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($ligne);
            $userList[] = $user;
        }
        return $userList;
    }
    public function getOne(): array
    {
        $logger = new MotifyLogging();
        $UserList = array();
        $id = $_GET['id'];
        $logger->message("get the data for the id : ".$id);
        $request = $this->_db->prepare('SELECT `Id`, Username, `Password`, `Role` FROM users WHERE Id= ?;');

        $request->bindParam(1, $id);
        $request->execute();

        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($ligne);
            $UserList[] = $user;
        }
        return $UserList;
    }
}
