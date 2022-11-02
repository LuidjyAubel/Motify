<?php
class Lego
{
    private $Id;
    private $complet;
    private $figurine;
    private $boite;
    private $notice;

    public function __construct(array $ligne)
    {
        $this->hydrate($ligne);
    }
    /**
     * Use key of database table for set attributs with the data in database
     * Use : all Setter
     * @param array $ligne
     */
    public function hydrate(array $ligne)
    {
        foreach ($ligne as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    /**
     * Set the value of Id
     * @param int $Id
     * @return self
     */
    public function setLego_id($Id)
    {
        $this->Id = $Id;
        return $this;
    }
    /**
     * Get the value of Id
     * @return self
     */
    public function getLego_id()
    {
        return $this->Id;
    }
    /**
     * Get the value of complet
     * @return self
     */
    public function getComplet()
    {
        return $this->complet;
    }
    /**
     * Set the value of complet
     * @param string $complet
     * @return self
     */
    public function setLego_complet($complet)
    {
        $this->complet = $complet;

        return $this;
    }
    /**
     * Get the value of figurine
     * @return self
     */
    public function getFigurine()
    {
        return $this->figurine;
    }
    /**
     * Set the value of figurine
     * @param string $figurine
     * @return self
     */
    public function setLego_figurine($figurine)
    {
        $this->figurine = $figurine;

        return $this;
    }
    /**
     * Get the value of boite
     * @return self
     */
    public function getBoite()
    {
        return $this->boite;
    }
    /**
     * Set the value of boite
     * @param string $boite
     * @return self
     */
    public function setLego_boite($boite)
    {
        $this->boite = $boite;

        return $this;
    }
    /**
     * Get the value of notice
     * @return self
     */
    public function getNotice()
    {
        return $this->notice;
    }
    /**
     * Set the value of notice
     * @param string $notice
     * @return self
     */
    public function setLego_notice($notice)
    {
        $this->notice = $notice;

        return $this;
    }
}
