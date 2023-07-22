<?php
include ('../Classes/Entity/Lego.php');
include('../lib/MotifyLogging.php');
Class LegoManager{
    private $_db;
    
    public function __construct(PDO $db){
        $this->setDb($db);
    }
    public function setDb($db){
        $this->_db = $db;
    }
    public function addLego($id, $complet, $minifig, $boite, $notice){
        $logger = new MotifyLogging();
        if(!strpos($id, "-1")){
            $id = $id."-1";
        }

        $url = "https://rebrickable.com/api/v3/lego/sets/".$id."/?key=".API_KEY;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //bidouille cause localhost
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //bidouille cause localhost

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($ch);
$obj = json_decode($output);
            $date = $obj->{'year'};

        $logger->warning("Adding new lego : ".$id);
        $stmt = $this->_db->prepare('INSERT INTO lego (lego_id, lego_complet, lego_figurine, lego_boite, lego_notice, lego_date) VALUES (?, ?, ?, ?, ?, ?);');
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $complet);
        $stmt->bindParam(3, $minifig);
        $stmt->bindParam(4, $boite);
        $stmt->bindParam(5, $notice);
        $stmt->bindParam(6, $date);
        $stmt->execute();
    }
    public function updateLego($id, $complet, $minifig, $boite, $notice, $origin){
        $logger = new MotifyLogging();
        $logger->warning("Updating lego : ".$id);
        $stmt = $this->_db->prepare("UPDATE lego set lego_id=?, lego_complet=?, lego_figurine=?, lego_boite=?, lego_notice=?WHERE lego_id=? ;");
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $complet);
        $stmt->bindParam(3, $minifig);
        $stmt->bindParam(4, $boite);
        $stmt->bindParam(5, $notice);
        $stmt->bindParam(6, $origin);
        $stmt->execute();
    }
    public function delete($Id)
    {
        $logger = new MotifyLogging();
        $logger->warning("Delecting lego : ".$Id);
        $stmt = $this->_db->prepare("DELETE FROM lego WHERE lego_id= ?;");
        $stmt->bindParam(1, $Id);
        $stmt->execute();
    }
        public function getList(): array
        {
            $logger = new MotifyLogging();
            $logger->warning("Display liste of lego");
        $request = $this->_db->query('SELECT `lego_id`, lego_complet, lego_figurine, lego_boite, lego_notice, lego_date FROM lego;');

        $userList = array();

        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $user = new Lego($ligne);
            $userList[] = $user;
        }
        return $userList;
    }
    public function exportCSV($list){
        $logger = new MotifyLogging();
        $fp = fopen('php://output', 'w');
        fputcsv($fp, array("Id", "Complet", "Figurine","Boite","Notice", "Date"));
        foreach ($list as $fields) {
            fputcsv($fp, array($fields->getLego_id(), $fields->getComplet(), $fields->getFigurine(),$fields->getBoite(),$fields->getNotice(), $obj->getDate()));
        }
        $logger->message("Export list of lego in CSV");
        fclose($fp);
    }
    public function getOne(): array
    {
        $logger = new MotifyLogging();
        $legoList = array();
        $id = $_GET['id'];
        $logger->message("Display the lego : ".$id);
        $request = $this->_db->prepare('SELECT `lego_id`, lego_complet, lego_figurine, lego_boite, lego_notice, lego_date FROM lego WHERE lego_id =?;');

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