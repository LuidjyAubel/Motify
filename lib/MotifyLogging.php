<?php
 class MotifyLogging{
    private $fichier = 'MotifyLog.log';

    public function __construct(){
        createFichier();
    }

    public function setFichier($_fichier){
        $this->fichier = $_fichier;
    }
    public function getFichier(){
        return $this->fichier;
    }
    static function message(string $msg){
        writeLog("Message",$msg);
    }
    static function Connecting(int $id, string $username){
        $msg = "id : ".$id." Username : ".$username."has been connected";
        writeLog("Connecting", $msg);
    }
    static function error($msg){
        writeLog("Error", $msg);
    }
    static function warning(){
        writeLog("Warnnig", $msg);
    }

    function createFichier(){
        touch(dirname(__DIR__).'/log/MotifyLog.log');
    }
    function writeLog(string $type,string $msg){
	   file_put_contents($this->getFichier(),"[".$type."] : ".$message,FILE_APPEND);
    }
}