<?php
 class MotifyLogging{
    private $fichier = '/log/MotifyLog.log';

    public function __construct(){
        if (!file_exists("../log")){
            mkdir("../log",0772);
        }
        $this->createFichier();
    }
    public function setFichier($_fichier){
        $this->fichier = $_fichier;
    }
    public  function getFichier(){
        return $this->fichier;
    }
     function message(string $msg){
        file_put_contents(dirname(__DIR__).$this->getFichier(),"[".$_SERVER['REMOTE_ADDR']."][".date( "d/m/Y H:i:s")."][Info] : ".$msg.PHP_EOL,FILE_APPEND);
    }
     function Connecting(string $username){
        $msg = $username." has been connected";
        file_put_contents(dirname(__DIR__).$this->getFichier(),"[".$_SERVER['REMOTE_ADDR']."][".date( "d/m/Y H:i:s")."][Info] : ".$msg.PHP_EOL,FILE_APPEND);
    }
     function error($msg){
        file_put_contents(dirname(__DIR__).$this->getFichier(),"[".$_SERVER['REMOTE_ADDR']."][".date( "d/m/Y H:i:s")."][Error] : ".$msg.PHP_EOL,FILE_APPEND);
    }
     function warning($msg){
        file_put_contents(dirname(__DIR__).$this->getFichier(),"[".$_SERVER['REMOTE_ADDR']."][".date( "d/m/Y H:i:s")."][Warn] : ".$msg.PHP_EOL,FILE_APPEND);
    }
    function createFichier(){
        touch(dirname(__DIR__).'/log/MotifyLog.log');
    }
}