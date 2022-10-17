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
    static function message(String $msg){
        writeLog("Message",$msg);
    }
    static function error(){

    }
    static function warning(){

    }

    function createFichier(){
        touch(dirname(__DIR__).'/log/MotifyLog.log');
    }
    function writeLog(String $type,String $msg){
	   file_put_contents($this->getFichier(),$type." : ".$message,FILE_APPEND) ;
    }
}