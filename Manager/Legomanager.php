<?php
include (dirname(__DIR__).'/Classes/Lego.php');
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
    }
    public function updateLego($id, $complet, $minifig, $boite, $notice){
        $stmt = $this->_db->prepare("UPDATE lego set lego_complet=?, lego_figurine=?, lego_boite=?, lego_notice=? WHERE lego_id=? ;");
        $stmt->bindParam(1, $complet);
        $stmt->bindParam(2, $minifig);
        $stmt->bindParam(3, $boite);
        $stmt->bindParam(4, $notice);
        $stmt->bindParam(5, $id);
        $stmt->execute();
    }
    public function delete($Id)
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
    public function getOne(): array
    {
        $legoList = array();
        $id = $_GET['id'];
        $request = $this->_db->prepare('SELECT `lego_id`, lego_complet, lego_figurine, lego_boite, lego_notice FROM lego WHERE lego_id =?;');

        $request->bindParam(1, $id);
        $request->execute();

        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $lego = new Lego($ligne);
            $legoList[] = $lego;
        }
        return $legoList;
    }
    }
?>