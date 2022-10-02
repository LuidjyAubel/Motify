<?php
include 'C:\Users\luidj\Documents\perso\Motify/Classes/User.php';
Class Usermanager{
    private $_db;
    
    public function __construct(PDO $db){
        $this->setDb($db);
    }
    public function setDb($db){
        $this->_db = $db;
    }
    public function addUser($user, $pass, $role){
        //$db = new PDO($host, $Usernam, $PassWD);
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $this->_db->prepare('INSERT INTO users (Username, `Password`, `Role`) VALUES (?, ?, ?);');
        $stmt->bindParam(1, $user);
        $stmt->bindParam(2, $pass);
        $stmt->bindParam(3, $role);
        $stmt->execute();
        //$stmt->destruct();
    }
    public function delete($Id) //:bool
    {
        $stmt = $this->_db->prepare("DELETE FROM users WHERE Id= ?;");
        $stmt->bindParam(1, $Id);
        $stmt->execute();
    }
    public function connect($MAiL, $pass2){
        session_start();
        $_SESSION["connecter"] = FALSE;
         $requete = $this->_db->query('SELECT `Id`, `Username`, `Password` FROM users');
 while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
     if ($MAiL == $ligne['Username']){
         $hash = $ligne['Password'];
        if (password_verify($pass2, $hash)) {
            echo 'Le mot de passe est valide !';
            $_SESSION['connecter'] = TRUE;
           //header('Location: musique.php');
        } else {
            session_destroy();
            echo 'Le mot de passe est invalide.';
        }
        }
    }
        }
        public function getList(): array
        {
            $userList = array();

        $request = $this->_db->query('SELECT `Id`, Username, `Role` FROM users;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($ligne);
            $userList[] = $user;
        }
        return $userList;
    }
    }
?>