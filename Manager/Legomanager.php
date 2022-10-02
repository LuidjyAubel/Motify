<?php
include 'C:\Users\luidj\Documents\perso\Motify/Classes/Lego.php';
Class LegoManager{
    private $_db;
    
    public function __construct(PDO $db){
        $this->setDb($db);
    }
    public function setDb($db){
        $this->_db = $db;
    }
    public function addLego($id, $complet, $minifig, $boite, $notice){
        $stmt = $this->_db->prepare('INSERT INTO lego (lego_id, lego_complet, lego_figurine, lego_boite, lego_notice) VALUES (?, ?, ?, ?, ?);');
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $complet);
        $stmt->bindParam(3, $minifig);
        $stmt->bindParam(4, $boite);
        $stmt->bindParam(5, $notice);
        $stmt->execute();
        //$stmt->destruct();
    }
    public function delete($Id) //:bool
    {
        $stmt = $this->_db->prepare("DELETE FROM lego WHERE lego_id= ?;");
        $stmt->bindParam(1, $Id);
        $stmt->execute();
    }
        public function getList(): array
        {
        $request = $this->_db->query('SELECT `lego_id`, lego_complet, lego_figurine, lego_boite, lego_notice FROM lego;');

        $userList = array();

        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $user = new Lego($ligne);
            $userList[] = $user;
        }
        return $userList;
    }
    }
?>