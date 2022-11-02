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
    /**
     * Adding a user with parameter getting in form
     * @param string $user
     * @param string $pass
     * @param string $role
     */
    public function addUser($user, $pass, $role)
    {
        $stmt = $this->_db->prepare('INSERT INTO users (Username, `Password`, `Role`) VALUES (?, ?, ?);');
        $stmt->bindParam(1, $user);
        $stmt->bindParam(2, $pass);
        $stmt->bindParam(3, $role);
        $stmt->execute();
        MotifyLogging::message();
    }
    /**
     * Updating the value of the object
     * @param int $id
     * @param string $username
     * @param string $pass
     * @param string $role
     */
    public function updateUser($id, $username, $pass, $role)
    {
        $stmt = $this->_db->prepare("UPDATE users set Username=?, `Password`=?, `Role`=? WHERE Id=? ;");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $pass);
        $stmt->bindParam(3, $role);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    }
    /**
     * Delecting an object user using id
     * @param int $Id
     */
    public function delete($Id)
    {
        $stmt = $this->_db->prepare("DELETE FROM users WHERE Id= ?;");
        $stmt->bindParam(1, $Id);
        $stmt->execute();
    }
    /**
     * Check the user credencial
     * @param string $MAil Username of the user
     * @param string $pass2 Password of the user
     */
    public function connect($MAiL, $pass2)
    {
        session_start();
        $_SESSION["connecter"] = FALSE;
        $requete = $this->_db->query('SELECT `Id`, `Username`, `Password` FROM users');
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
            if ($MAiL == $ligne['Username']) {
                $hash = $ligne['Password'];
                if (password_verify($pass2, $hash)) {
                    echo 'Le mot de passe est valide !';
                    $_SESSION['connecter'] = TRUE;
                    header("Location: LegoList.php");
                } else {
                    session_destroy();
                    echo 'Le mot de passe est invalide.';
                }
            }
        }
    }
    /**
     * Get an array that contain all of user
     * @return array $userList
     */
    public function getList(): array
    {
        $userList = array();

        $request = $this->_db->query('SELECT `Id`, Username, `Password`, `Role` FROM users;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($ligne);
            $userList[] = $user;
        }
        return $userList;
    }
        /**
     * Get an array that contain one user
     * @return array $userList
     */
    public function getOne(): array
    {
        $UserList = array();
        $id = $_GET['id'];
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
