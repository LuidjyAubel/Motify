<?php
class Lego {
    private $Id;
    private $complet;
    private $figurine;
    private $boite;
    private $notice;

    public function __construct(array $ligne){
        $this->hydrate($ligne);
    }

    public function hydrate(array $ligne){
        foreach ($ligne as $key => $value) {
             $method = "set".ucfirst($key);
            if (method_exists($this, $method)){
                //le dollar on appel la methode dynamiquement car il est dans la variable method 
                $this->$method($value);
            }
        }
    }
    public function setLego_id($Id)
    {
        $this->Id = $Id;
    }
    public function getLego_id()
    {
        return $this->Id;
    }
    public function getComplet()
    {
        return $this->complet;
    }
    public function setLego_complet($complet)
    {
        $this->complet = $complet;

        return $this;
    }
    public function getFigurine()
    {
        return $this->figurine;
    }
    public function setLego_figurine($figurine)
    {
        $this->figurine = $figurine;

        return $this;
    }
    public function getBoite()
    {
        return $this->boite;
    }
    public function setLego_boite($boite)
    {
        $this->boite = $boite;

        return $this;
    }
    public function getNotice()
    {
        return $this->notice;
    }
    public function setLego_notice($notice)
    {
        $this->notice = $notice;

        return $this;
    }
}